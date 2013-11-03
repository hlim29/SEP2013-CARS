<?php
Class Subject_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	function getData($userID, $table){
		$this->db->where('UserID',$userID);
		$query = $this->db->get($table);
		if ($query->num_rows() > 0)
			return ($query->row());
		else
			return null;
	}
	
	
	
	function getAllSubjects(){
		$this->db->select('*');
		$this->db->from('subjects');
		$this->db->join('employees', 'employees.UserID = subjects.SubjectCoordinator');
		return $this->db->get();
		
	}
	
	//Retrieves the ID of the person who last registered
}
?>