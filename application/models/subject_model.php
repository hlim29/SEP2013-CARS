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
	
	function insertSubject($id, $name, $coordinator){
		if ($this->getSubject($id) != null){
		$data = array(
			
			'subjectname' => $name, 
			'subjectcoordinator' => $coordinator 
			);
			$this->db->where('subjectid', $id);
			return $this->db->update('subjects', $data); 
			
		}
		else{
		$data = array(
			'subjectid' => $id,
			'subjectname' => $name, 
			'subjectcoordinator' => $coordinator 
			);
			return $this->db->insert('subjects', $data); 
		}
			

			
	}
	
		function updateSubject($id, $name, $coordinator){
		$data = array(
			'subjectname' => $name, 
			'subjectcoordinator' => $coordinator 
			);
			
			$this->db->where('subjectid', $id);
			return $this->db->update('subjects', $data); 
	}
	
	function getSubject($id){
		$this->db->select('*');
		$this->db->from('subjects');
		$this->db->where('subjectid', $id);
		$query = $this->db->get();
		if ($query->num_rows()>0)
			return $query -> row();
		else
		return null;
	}
	
	function getAllSubjects(){
		$this->db->select('*');
		$this->db->from('subjects');
		$this->db->join('employees', 'employees.UserID = subjects.SubjectCoordinator',  'inner');
		$this->db->join('users', 'users.UserID = employees.UserID');
		
		return $this->db->get();
		
	}
	
	//Retrieves the ID of the person who last registered
}
?>