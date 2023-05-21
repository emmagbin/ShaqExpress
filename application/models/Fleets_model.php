<?php
defined('BASEPATH') or exit('No direct script access allowed');

//This is the Book Model for CodeIgniter CRUD using Ajax Application.
class Fleets_model extends CI_Model
{

        var $table = 'vehicle';

        public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

        public function get_all_fleets()
        {
                $query = $this->db->query("SELECT vehicle.*, CONCAT(staff.lastname,'   ' ,staff.othernames) as creator FROM `vehicle` inner JOIN staff ON vehicle.createdby =staff.login_id

");
                return $query->result();
        }

        public function getfleets()
        {
                $query = $this->db->query("SELECT id,CONCAT(plateno, '   ',vehicleType,'   ' , brand,'    ', model) as plateno FROM  vehicle ");
                return $query->result_array();
        }

        // SELECT `id`, `plateno`, `vehicleType`, `brand`, `model`, `roadworkstart`, `roadworkExpiry`, `insurancestart`, `insuranceexpiry`,
        //  `purchasedate`, `status`, `created_at`, `createdby`, `updatedby`, `updated_at` FROM `vehicle` WHERE 1

        public function vehiclefields($login_id)
        {
                $fields = array(
                        'plateno' =>  $this->input->post('plateno'),
                        'vehicleType' => $this->input->post('vehicleType'),
                        'brand' => $this->input->post('brand'),
                        'model' => $this->input->post('model'),
                        'roadworkstart' => $this->input->post('roadworkstart'),
                        'roadworkExpiry' => $this->input->post('roadworkExpiry'),
                        'insurancestart' => $this->input->post('insurancestart'),
                        'insuranceexpiry' => $this->input->post('insuranceexpiry'),
                        'purchasedate' => $this->input->post('purchasedate'),
                        'createdby' => $login_id,
                );
                return $fields;
        }

        public function vehicleUpdatefields($login_id)
        {
                $fields = array(
                        'plateno' =>  $this->input->post('plateno'),
                        'vehicleType' => $this->input->post('vehicleType'),
                        'brand' => $this->input->post('brand'),
                        'model' => $this->input->post('model'),
                        'roadworkstart' => $this->input->post('roadworkstart'),
                        'roadworkExpiry' => $this->input->post('roadworkExpiry'),
                        'insurancestart' => $this->input->post('insurancestart'),
                        'insuranceexpiry' => $this->input->post('insuranceexpiry'),
                        'purchasedate' => $this->input->post('purchasedate'),
                        'updatedby' => $login_id,

                );
                return $fields;
        }

        public function createfleet($login_id)
        {
                if ($this->db->insert($this->table, $this->vehiclefields($login_id))) {
                        $inserted = $this->db->insert_id();
                        $this->uploadvehiclephoto($inserted);

                        // uploadvehiclephoto($userid)
                } else {
                        return false;
                }
        }


        public function updatefleet($login_id)
        {
                $this->db->set($this->vehicleUpdatefields($login_id));
                $this->db->where('id', $this->input->post('id'));

                if ($this->db->update($this->table, $this->vehicleUpdatefields($login_id))) {
                        $this->edit_uploadvehiclephoto($this->input->post('id'));

                        return true;
                } else {
                        return false;
                }
        }

        public function enabl_disable_fleet($login_id)
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



        public function uploadvehiclephoto($userid)
        {
                $config['file_name']        =  $userid;
                $config['upload_path']          = './assets/vehicle/photos/';
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = 10000000;
                $config['max_width']            = 6000;
                $config['max_height']           = 6000;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('output_image')) {
                        return array('error' => $this->upload->display_errors());
                } else {
                        $data = array('upload_data' => $this->upload->data());


                        $photo = ($data['upload_data']['file_ext']);


                        $myphoto = $userid . $photo;
                        $data = array(
                                'vehiclephoto' => $myphoto
                        );
                        $this->db->set($data);
                        $this->db->where('id', $userid);
                        $this->db->update($this->table, $data);
                }
        }

        public function edit_uploadvehiclephoto($userid)
        {
                $config['file_name']        =  $userid;
                $config['upload_path']          = './assets/vehicle/photos/';
                $config['allowed_types']        = 'jpeg|jpg|png';
                $config['max_size']             = 10000000;
                $config['max_width']            = 6000;
                $config['max_height']           = 6000;


                $oldphoto = $this->input->post('txtvehiclephoto_id');



                $filename = './assets/vehicle/photos/' . $oldphoto;
                if (file_exists($filename)) {

                        rename("./assets/vehicle/photos/" . $oldphoto, "./assets/vehicle/photos/" . "newname" . $oldphoto);
                }



                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('output_image')) {

                        if ($this->input->post('txtvehiclephoto_id')) {
                                rename("./assets/vehicle/photos/" . "newname" . $oldphoto, "./assets/vehicle/photos/" . $oldphoto);

                                return array('error' => $this->upload->display_errors());
                        }
                } else {
                        $data = array('upload_data' => $this->upload->data());


                        $photo = ($data['upload_data']['file_ext']);

                        $photo;
                        $myphoto = $userid . $photo;
                        $data = array(
                                'vehiclephoto' => $myphoto
                        );
                        $this->db->set($data);
                        $this->db->where('id', $userid);
                        $this->db->update($this->table, $data);

                        unlink("./assets/vehicle/photos/" . "newname" . $oldphoto);
                }
        }

        // ==========================================


}
