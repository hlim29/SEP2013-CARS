<?php
Class Contract_model extends CI_Model
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
	
	function assignUser($eid, $id){
		$data = array(	'EmployeeID' => $eid,
						'SubjectNumber' => $id
		
		
		);
		return $this -> db -> insert('contracts',$data);
	}
	
	
	
	function getAllSubjects(){
		$this->db->select('*');
		$this->db->from('subjects');
		$this->db->join('employees', 'employees.UserID = subjects.SubjectCoordinator');
		return $this->db->get();
		
	}
	
	function getContracts($eID){
	$this->db->select('*');
		$this->db->from('contracts');
		$this->db->join('subjects', 'contracts.SubjectNumber = subjects.SubjectID');
		$this->db->join('employees', 'subjects.SubjectCoordinator = employees.EmployeeID');
		$this->db->where('contracts.EmployeeID',$eID);
		return $this->db->get();
		
	}
	
	//Retrieves the ID of the person who last registered
}
?>