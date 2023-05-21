<?php
class User extends CI_Model
{
   function login($logintoken)
   {
      $status = 0;
      $this->db->select(' id ');
      $this->db->from('login');
      $this->db->where('password', $logintoken);
      $this->db->where('status', $status);

      $this->db->limit(1);
      $query = $this->db->get();
      if ($query->num_rows() == 1) {

         $login_id = $query->result_array();
         $id = $login_id[0]['id'];
         $query = $this->db->query("select staff.*,login.username,login.logincount,login.password,login.role  FROM staff inner join login on login.id=staff.login_id WHERE login_id='$id' ");
         $result = $query->result();
         return $result;
      } else {
         return false;
      }
   }


   public function insertUser($login_id)
   {

      $passwordCombination = $this->input->post('username') . $this->input->post('password');
      $passwordToken = hash('sha512', $passwordCombination);

      $logindata = array(
         'password' => $passwordToken,
         'username' => $this->input->post('username'),
         'logincount' => 0,
         'role' => $this->input->post('role'),
         'createdby' => $login_id,
      );
      if ($this->db->insert("login", $logindata)) {
         $insert_id = $this->db->insert_id();
         $data = array(
            'login_id' => $insert_id,
            'lastname' => $this->input->post('lastname'),
            'othernames' => $this->input->post('othernames'),
            'position' => $this->input->post('position'),
            'email' => $this->input->post('email'),
            'dob' => $this->input->post('dob'),
            'gender' => $this->input->post('gender'),
            'phonenumner' => $this->input->post('phonenumner'),
            'homeaddress' => $this->input->post('homeaddress'),
            'createdby' => $login_id,


         );
         if ($this->db->insert("staff", $data)) {
            return true;
         } else {
            return false;
         }
      } else {
         return false;
      }
   }

   public function checklogincount($login_id)
   {
      if ($login_id === 0) {
         return number_format(10);
      } else {
         $query = $this->db->query("select logincount from login where id='$login_id' ");
         $logincountt = $query->result_array();
         return number_format($logincountt[0]['logincount']);
      }
   }
   public function checkUser($checkusername)
   {
      $query = $this->db->query("select count(*) as number FROM `login` WHERE username='$checkusername' ");
      $result = $query->result_array();
      return $result;
   }

   //  $this->User->changepasswordUser($session_data['login_id'], $passwordToken_new);

   public function changepasswordUser($login_id, $passwordToken_new)
   {

      $changepass = array(
         'password' => $passwordToken_new,
         'logincount' => 10,
         'createdby' => $login_id,
      );

      $this->db->set($changepass);
      $this->db->where('id', $login_id);
      return   $this->db->update("login", $changepass);
   }
   function updateLogin($user_id)
   {

      $data = array(
         'isLogin' => 1
      );
      $this->db->set($data);

      // $this->db->where('id', $this->input->post('user_id'));
      $this->db->where('id', $user_id);
      return   $this->db->update("login", $data);
   }

   function updateLogin_1($user_id)
   {

      $data = array(
         'isLogin' => 0
      );
      $this->db->set($data);

      // $this->db->where('id', $this->input->post('user_id'));
      $this->db->where('id', $user_id);
      return   $this->db->update("login", $data);
   }


   function userRoles()
   {
      $queryroles = $this->db->query("select roleName from roles ");
      // $page['resultroles'] = 
      return $queryroles->result_array();
   }


   public  function userPrivileges($rolename)
   {
      $query = $this->db->query("select * FROM `roleprivilege` WHERE rolename='$rolename' ");
      $result = $query->result();
      return $result;
   }
}
