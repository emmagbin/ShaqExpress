
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
//This is the Controller for codeigniter crud using ajax application.
class RoleManagementController extends CI_Controller {
 
public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
			
	 		//$this->load->model('Service_Category_Model');
	 	}

public function index()
	{

		if($this->session->userdata('logged_in'))
		{
			   $session_data = $this->session->userdata('logged_in');
            $users['usersfullname'] = $session_data['usersfullname'];
            $users['useremail'] = $session_data['useremail'];
            $users['logintoken'] = $session_data['logintoken'];
            $users['finame'] = $session_data['finame'];

			// $this->load->controllers('usersManagementController');
			// $roles=$this->usersManagementController->all_roles();
			

			// $this->load->library('../controllers/usersManagementController');
			// $roles=$this->usersManagementController->all_roles();
			// var_dump($roles); die;


                                      $users['all_roles']=$this->all_roles(); 

                                       $users['roles']=$this->roles(); 




$query= $this->db->query(" select

(select count(distinct(rolename)) from roles) as totalroles,
 
 (select count(distinct(rolename)) from roles where rolename!='Admin') as rolewithusers,

 (select count(distinct(rolename)) from roles where not exists (select rolename from roles)) as freeRoles");
        $results = $query->row();
                    $users['totalroles']=$results->totalroles;
                          $users['rolewithusers']=$results->rolewithusers;
                                $users['freeRoles']=$results->freeRoles;
			//var_dump($users['totalroles']); die;

 
 		
         $users['active']='role';
      
		// $this->load->view('roleManagement',$users);


		}
		else
		{
		//If no session, redirect to login page
		redirect('login', 'refresh');
		}


	}

	 public function roles()
    {
        $query= $this->db->query("select rolename from roles ");
        $users= $query->result();
        return $users;
    }


     public function all_roles()
    {
        $query= $this->db->query("select * from roles ");
        $users= $query->result();
        return $users;
    }
 public function rolePreviledges()
 {
 	$rolename= $this->input->post('rolename');
 	$query= $this->db->query("select id,previledge from previledges where rolename = '$rolename' ");
        $previledges= $query->result();
        echo json_encode($previledges);



 }

	public function newrole()
		{
			$rolename= $this->input->post('rolename');
			$previledge= $this->input->post('previledges');
			$createdby=$this->input->post('createdby');

			//var_dump($previledge); die;


				$this -> db -> select('rolename');
		        $this -> db -> from('roles');
		        $this -> db -> where('rolename', $rolename);
		        $this -> db -> limit(1);
		        $query = $this -> db -> get();
		        if($query -> num_rows() == 0)
		        {
		            //var_dump('$query->result()') ;

		             $roles = array(
							'rolename' => $rolename,
							'createdby' =>$createdby,
							'status' =>'A'
							
						 );
 						$this->db->insert('roles', $roles);


		        foreach ($previledge as $value) {
						  $data = array(
							'rolename' => $rolename,
							'previledge' =>$value,
							'createdby' =>$createdby
							
						 );
 						$this->db->insert('previledges', $data);
						}
						
				                echo("1");
                                
		        }
		        else
		        {
		          			    echo("0");
                               
		        }			
		}



	public function roleupdate()
		{
			
			$rolename= $this->input->post('rolename');
			$txtrolenameOldName= $this->input->post('txtrolenameOldName');
			$previledge= $this->input->post('previledges');
			$updatedby=$this->input->post('updatedby');
			$txtid=$this->input->post('txtid');
			$updatedatetime=date("Y-m-d h:i:sa");
			 $output;

			//check to see if update role name exist in the system
				$this -> db -> select('rolename');
		        $this -> db -> from('roles');
		        $this -> db -> where('rolename', $rolename);
		        $this -> db -> limit(1);
		        $query = $this -> db -> get();


		   //if role name dont exist update
		        if($query -> num_rows() == 0)
		        {
		        	
		             $roles = array(
							'rolename' => $rolename,
							'lastupdatedate' => date("Y-m-d"),
							'lastupdatetime' => date("h:i:sa"),
							'lastupdatedby' =>$updatedby
						 );
					        $this->db->set($roles);
					        $this->db->where('id',$txtid);
					        $this->db->update("roles",$roles);



					        $Prerolename = array(
							'rolename' => $rolename
						      );
					        $this->db->set($Prerolename);
					        $this->db->where('rolename',$txtrolenameOldName);
					        $this->db->update("previledges",$Prerolename);

					        if($previledge!="")
					        {
					        	// var_dump($previledge); die;
					        	foreach ($previledge as $value) 
					        	{		

									$this -> db -> select('previledge');
							        $this -> db -> from('previledges');
							        $this -> db -> where('rolename', $rolename);
							        $this -> db -> where('previledge', $value);
							        $this -> db -> limit(1);
							        $query = $this -> db -> get();
							        if($query -> num_rows() ==1)
							        {
							        	
							        	 $updatingRolePreviledges = array(
							        	 	'rolename' => $rolename,
									            'previledge' =>$value,
									            'lastupdatedatetime' => $updatedatetime,
									            'lastupdatedby' => $updatedby,
									           
									        );
							        	  
									        $this->db->set($updatingRolePreviledges);
									        $this->db->where('previledge',$value);
									        $this->db->where('rolename',$rolename);
									        $this->db->update("previledges",$updatingRolePreviledges);

									}
									else
									{

										$data = array(
												'rolename' => $rolename,
												'previledge' =>$value,
												 'lastupdatedatetime' => $updatedatetime,
												'createdby' =>$updatedby,
												 'lastupdatedby' => $updatedby,
												
											 );

										
					 						$this->db->insert('previledges', $data);
									}


								}

							}
								       

									    $this->db->WHERE('lastupdatedatetime !=',$updatedatetime);
								        $this->db->WHERE('rolename',$rolename);
										$this->db->delete("previledges");
										//tbl_tabel_name != ', $id_name;

										//  //echo("1");
											$output=1;
										  
                                
		        }
		        if(($query -> num_rows() == 1) and ($rolename!=$txtrolenameOldName) )
		        {
		        	$output=4;
		        }

		       //if update role name exist
		        else{

		        		 if($previledge!="")
					        {
					        	//echo json_encode("not empty");die;

					        foreach ($previledge as $valuee) 
					        	{				       
					        		//var_dump($valuee); die;
									$this -> db -> select('previledge');
							        $this -> db -> from('previledges');
							        $this -> db -> where('rolename', $rolename);
							        $this -> db -> where('previledge', $valuee);
							        $this -> db -> limit(1);
							        $query = $this -> db -> get();
							        if($query -> num_rows() >0)
							        {
							        	  $updatingRolePreviledges = array(
									            'previledge' =>$valuee,
									            'lastupdatedatetime' => $updatedatetime,
									            'lastupdatedby' => $updatedby,
									           
									        );
							        	  
									        $this->db->set($updatingRolePreviledges);
									        $this->db->where('previledge',$valuee);
									        $this->db->where('rolename',$rolename);
									        $this->db->update("previledges",$updatingRolePreviledges);
									}
									else{

										 $data = array(
												'rolename' => $rolename,
												'previledge' =>$valuee,
												 'lastupdatedatetime' => $updatedatetime,
												'createdby' =>$updatedby,
												 'lastupdatedby' => $updatedby,
												
											 );
					 						$this->db->insert('previledges', $data);


									}
								}

								        $this->db->WHERE('lastupdatedatetime !=',$updatedatetime);
								        $this->db->WHERE('rolename',$rolename);
										$this->db->delete("previledges");
									    $output=2;   		
					        }
					        else
					        {
					        	        $this->db->WHERE('lastupdatedatetime !=',$updatedatetime);
								        $this->db->WHERE('rolename',$rolename);
										$this->db->delete("previledges");
								$output=3; 

					        }

					                    



 						
		        }





										 
										 echo($output);die;



						
				
                               			
		}
		public function DisableRole()
		{

											$id=$this->input->post('Disableid');
											 $DisableRole = array(
									            'status' =>'D'
									        );
									        $this->db->set($DisableRole);
									        $this->db->where('id',$id);
									        $this->db->update("roles",$DisableRole);
											redirect('role');
		}

		public function ActivateRole()
		{

											$id=$this->input->post('activateid');
											 $ActivateRole = array(
									            'status' =>'A'
									        );
									        $this->db->set($ActivateRole);
									        $this->db->where('id',$id);
									        $this->db->update("roles",$ActivateRole);
											redirect('role');
		}

		public function deleteRole()
		{

			$id=$this->input->post('Deleteid');
			$Deleterolename=$this->input->post('Deleterolename');
			
			$this->db->WHERE('id',$id);
			$this->db->delete("roles");

			$this->db->WHERE('rolename',$Deleterolename);
			$this->db->delete("previledges");
					redirect('role');
		}


}

