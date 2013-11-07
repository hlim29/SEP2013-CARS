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
	
	function update($id, $sdate, $edate, $weeks, $day, $stime, $etime, $rate){
		$data = array(
			'startdate' => $sdate,
			'enddate' => $edate,
			'paidweeks' => $weeks,
			'dayofweek' => $day,
			'starttime' => $stime,
			'endtime' => $etime,
			'hourlyrate' => $rate,
			'status' => 0
		);
		$this->db->where('contractno', $id);
		return $this->db->update('contracts', $data); 
	}
	
	function approve($id){
		$data = array(
			'status' => 2
		);
		$this->db->where('contractno', $id);
		return $this->db->update('contracts', $data); 
	}
	
		function reject($id){
		$data = array(
			'status' => 1
		);
		$this->db->where('contractno', $id);
		return $this->db->update('contracts', $data); 
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
		$this->db->join('employees', 'contracts.EmployeeID = employees.EmployeeID');
		$this->db->where('contracts.EmployeeID',$eID);
		return $this->db->get();
	}
	
	function getCContracts($eID){
	$this->db->select('*');
		$this->db->from('contracts');
		$this->db->join('subjects', 'contracts.SubjectNumber = subjects.SubjectID');
		$this->db->join('employees', 'contracts.EmployeeID = employees.EmployeeID');
		$this->db->where('subjects.SubjectCoordinator',$eID);
		return $this->db->get();
	}
	
	function getCurrContracts($eID){
	$this->db->select('*');
		$this->db->from('contracts');
		$this->db->join('subjects', 'contracts.SubjectNumber = subjects.SubjectID');
		$this->db->join('employees', 'contracts.EmployeeID = employees.EmployeeID');
		$this->db->where('subjects.SubjectCoordinator',$eID);
		$this->db->where('contracts.status',2);
		return $this->db->get();
	}
	
	function getCContract($cID){
	$this->db->select('*');
		$this->db->from('contracts');
		$this->db->join('subjects', 'contracts.SubjectNumber = subjects.SubjectID');
		$this->db->join('employees', 'contracts.EmployeeID = employees.EmployeeID');
		$this->db->where('contracts.ContractNo',$cID);
		$query =  $this->db->get();
		return $query->row();
	}
	
	//Retrieves the ID of the person who last registered
}
?>