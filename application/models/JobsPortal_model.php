<?php
Class JobsPortal_model extends CI_Model
{


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function all_joblocations()
{
    $query= $this->db->query("select joblocation.*, staff.lastname,staff.firstname,staff.othername from joblocation inner join staff on joblocation.createby=staff.login_id where joblocation.status!=2 ");

    $joblocations= $query->result();
    return $joblocations;
}



















}
?>