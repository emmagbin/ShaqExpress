<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class fleetdoc_Model extends CI_Model
{

    var $table = 'vehicledoc';
    // var $tableh = 'orderhistory';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_fleetdoc()
    {
        $query = $this->db->query("SELECT vehicledoc.*,vehicle.vehiclephoto,vehicle.brand,vehicle.plateno,vehicledoctype.vehicledoctypename, CONCAT(staff.lastname,'   ' ,staff.othernames) as creator FROM `vehicledoc` 
        inner JOIN staff ON vehicledoc.createdby =staff.login_id INNER JOIN vehicle on vehicle.id=vehicledoc.vehicleid INNER JOIN vehicledoctype on vehicledoc.vehicledoctypeid=vehicledoctype.id

");
        return $query->result();
    }



    public function createdoc($login_id)
    {



        $directoryName = 'assets/vehicle/doc/' . $this->input->post('vehicleid');
        /* Check if the directory already exists. */
        if (!is_dir($directoryName)) {
            /* Directory does not exist, so lets create it. */
            mkdir($directoryName, 0755);
        }

        $fields = array(
            'vehicleid' =>  $this->input->post('vehicleid'),
            'vehicledoctypeid' =>  $this->input->post('vehicledoctypeid'),
            'remark' =>  $this->input->post('remark'),
            'createdby' => $login_id,
        );
        if ($this->db->insert($this->table, $fields)) {
            $userid = $this->db->insert_id();
            $foldername = $this->input->post('vehicleid');

            $this->uploaddoc($userid, $foldername);
            return true;
        } else {
            return false;
        }
    }

    public function updatedoc($login_id)
    {


        $directoryName = 'assets/vehicle/doc/' . $this->input->post('vehicleid');
        /* Check if the directory already exists. */
        if (!is_dir($directoryName)) {
            /* Directory does not exist, so lets create it. */
            mkdir($directoryName, 0755);
        }

        $data = array(
            'vehicleid' =>  $this->input->post('vehicleid'),
            'vehicledoctypeid' =>  $this->input->post('vehicledoctypeid'),
            'remark' =>  $this->input->post('remark'),
            // 'photopath' =>  $this->input->post('photopath'),
            'updatedby' => $login_id,
        );
        $foldername = $this->input->post('vehicleid');


        $this->db->set($data);
        $this->db->where('id', $this->input->post('id'));;
        if ($this->db->update($this->table, $data)) {

            return    $this->edit_uploaddoc($this->input->post('id'), $foldername);

            // return true;
        } else {
            return false;
        }
    }

    public function enabl_disable_doc($login_id)
    {
        if ($this->input->post('enabledisable') === 'disable') {
            $data = array(
                'status' => 0,
                'updatedby' => $login_id,
            );
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update($this->table, $data);
        } elseif ($this->input->post('enabledisable') === 'enable') {
            $data = array(
                'status' => 1,
                'updatedby' => $login_id,
            );
            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update($this->table, $data);
        }
        return true;
    }

    public function uploaddoc($userid, $foldername)
    {

        // 'assets/vehicle/doc/' . $this->input->post('vehicleid');

        $config['file_name']        =  $userid;
        $config['upload_path']          = './assets/vehicle/doc/' . $foldername;
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 1000000;
        $config['max_width']            = 6000;
        $config['max_height']           = 6000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('output_image')) {
            return array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());


            $photo = ($data['upload_data']['file_ext']);

            $photo;
            $myphoto = $userid . $photo;
            $data = array(
                'photopath' => $myphoto
            );
            $this->db->set($data);
            $this->db->where('id', $userid);
            $this->db->update($this->table, $data);
        }
    }
    // ==========================================

    public function edit_uploaddoc($userid, $foldername)
    {
        $config['file_name']        =  $userid;
        $config['upload_path']          = './assets/vehicle/doc/' . $foldername . "/";
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = 1000000;
        $config['max_width']            = 6000;
        $config['max_height']           = 6000;


        $oldphoto = $this->input->post('txtphotopath');
        // return $this->input->post('txtphotopath');


        if (!empty($this->input->post('txtphotopath'))) {
            $filename = './assets/vehicle/doc/' . $foldername . "/" . $oldphoto;
            if (file_exists($filename)) {
                // return "yes";
                rename("./assets/vehicle/doc/" . $foldername . "/" . $oldphoto, "./assets/vehicle/doc/" . $foldername . "/" . "newname" . $oldphoto);
            }
        }




        $this->load->library('upload', $config);


        if (!$this->upload->do_upload('output_image')) {

            if (!empty($this->input->post('txtphotopath'))) {
                rename("./assets/vehicle/doc/" . $foldername . "/" . "newname" . $oldphoto, "./assets/vehicle/doc/" . $foldername . "/" . $oldphoto);

                array('error' => $this->upload->display_errors());
            }

            return true;
        } else {
            $data = array('upload_data' => $this->upload->data());


            $photo = ($data['upload_data']['file_ext']);


            $myphoto = $userid . $photo;
            $data = array(
                'photopath' => $myphoto
            );
            $this->db->set($data);
            $this->db->where('id', $userid);
            $this->db->update($this->table, $data);

            if (!empty($this->input->post('txtphotopath'))) {
                // ($this->input->post('txtphotopath'));
                unlink("./assets/vehicle/doc/" . $foldername . "/" . "newname" . $oldphoto);
            }
        }
    }
}
