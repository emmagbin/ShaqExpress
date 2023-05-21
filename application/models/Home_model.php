<?php
class Home_model extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                $this->load->database();

        }

   // public $title;
  //       public $content;
  //       public $date;


 // function login($logintoken)
 //    {

 //         $this-> db ->select('*');
	// 	 $this-> db ->from('sysFIUsers');
	// 	 $this -> db -> where('logintoken', $logintoken);
 //         $this -> db -> where('status', 'A');
 //         $this -> db -> limit(1);
 //        $query = $this -> db -> get();

 //        if($query -> num_rows() == 1)
 //        {
 //            return $query->result();
 //        }
 //        else
 //        {
 //            return false;
 //        }
 //    }

//  $this->load->helper('url');
//     $data = array(
//         'title' => $this->input->post('title'),
//         'text' => $this->input->post('text')
//     );

//     return $this->db->insert('news', $data);

//     $data = array(
//         'title' => $title,
//         'name' => $name,
//         'date' => $date
// );

// $this->db->where('id', $id);
// $this->db->update('mytable', $data);

public function get_dashboard_data($data = FALSE)
{
        if ($data === FALSE)
        {
                $query = $this->db->get('sysFIUsers');
                return $query->result_array();
        }

        $query = $this->db->get_where('sysFIUsers', array('useremail' => $data));
        return $query->row_array();
}

        public function get_last_ten_entries()
        {
                $query = $this->db->get('sysFIUsers', 10);
                return $query->result();
        }

       






public function set_news()
{
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array(
        'title' => $this->input->post('title'),
        'text' => $this->input->post('text')
    );

    return $this->db->insert('news', $data);
}

 public function updating_news()
        {
			  $data = array(
			        'title' => $this->input->post('title'),
			        'text' => $this->input->post('text')
			    );
				 $this->db->where('id', $this->input->post('id'));
				return $this->db->update('news', $data);
}




}