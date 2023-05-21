<?php
class companyinfo_model extends CI_Model
{
    private $_table = "companyinfo";

    public function get_company_information()
    {
        // $_table = "products";
        return $this->db->get($this->_table)->result();
    }

    // SELECT `id`, `last_name`, `other_names`, `email`, `logintoken`, `contact`, `position`, `role`, `datetime`, `status` FROM `users` WHERE 1

    public function insertUpdate_company_information()
    {
        $id = $this->input->post('id');

        $passwordCombination = strtolower($this->input->post('admin_email')) . strtolower($this->input->post('admin_contact'));
        $logintoken = hash('sha512', $passwordCombination);


        $data = array(
            'company_name' => $this->input->post('company_name'),
            'company_address' => $this->input->post('company_address'),
            'company_website' => $this->input->post('company_website'),
            'logo' =>  $this->input->post('myimaging'),

        );


        $dataAdmin = array(
            'last_name' => $this->input->post('admin_last_name'),
            'other_names' => $this->input->post('admin_first_name'),
            'email' => trim($this->input->post('admin_email')),
            'contact' => trim($this->input->post('admin_contact')),
            'logintoken' => $logintoken,
            'role' => "Admin",
            'position' => "Admin",
            'status' => 1,
            'createdBy' => "Developer",
        );

        if ($id == 0) {
            $this->db->insert('companyinfo', $data);
            return $this->db->insert('users', $dataAdmin);
        } else {
            $this->db->where('id', $id);
            $this->db->update('companyinfo', $data);


            $this->db->where('id', trim($this->input->post('admin_id')));
            return $this->db->update('users', $dataAdmin);
        }
    }
}
