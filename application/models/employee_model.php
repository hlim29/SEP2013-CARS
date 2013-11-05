<?php
Class Employee_model extends CI_Model
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
	
	function getType($type){
		$this->db->select('*');
		$this->db->from('employees');
		$this->db->join('users', 'employees.UserID = users.UserID',  'inner');
		$this->db->where('users.PrivilegeID',$type);
		return $this->db->get();
	}
	
	function submit($uid){
		$data = array(
			'IsSubmitted' => 1 
			);
		$this->db->where('userid', $uid);
		return $this->db->update('employees', $data); 
	}
	
	function checkAll($uid){
		if ($this->employee_model->getData($uid, 'employees') == null)
			return false;
		if ($this->employee_model->getData($uid, 'financials') == null)
			return false;
		if ($this->employee_model->getData($uid, 'citizenshipstatuses') == null)
			return false;
		if ($this->employee_model->getData($uid, 'emergencycontacts') == null)
			return false;
		return true;
	}
	
	function financials($uid, $bsb, $accno, $branch, $institution, $isNew){
		$data = array(
			'userid' =>$uid, 
			'bsb' => $bsb, 
			'accountno' => $accno, 
			'branchname' => $branch, 
			'institutionname' => $institution
			);
		if ($isNew){
			return $this -> db -> insert('financials',$data);
		} else {
			$this->db->where('userid', $uid);
			return $this->db->update('financials', $data); 
			//return true;
		}
	}
	
	function emergency($uid,$gname,$sname,$relation,$ph,$mob,$isNew){
		$data = array(
			'userid' => $uid, 
			'givenname' => $gname, 
			'surname' => $sname, 
			'relationship' => $relation, 
			'daytimenumber' => $ph, 
			'mobilenumber' => $mob
			);
		if ($isNew){
			return $this -> db -> insert('emergencycontacts',$data);
		} else {
			$this->db->where('userid', $uid);
			return $this->db->update('emergencycontacts', $data); 
			//return true;
		}
	}
	
	
	function citizenship($uid, $cissue, $ppno, $vtype, $status, $isNew){
	$data = array(
		'userid' => $uid, 
		'countryofissue' => $cissue, 
		'passportno' => $ppno, 
		'visatype' => $vtype, 
		'citizenshipstatus' => $status
		);
		if ($isNew){
		return $this -> db -> insert('citizenshipstatuses',$data);
		
		} else {
		$this->db->where('userid', $uid);
		$this->db->update('citizenshipstatuses', $data); 
		return true;
		}
	}
	function add($t, $uid, $fname, $mname, $lname, $addr, $state, $pcode, $dob, $gender, $isNew){

		//NOTE: Ensure that the settings in 'application/config/database.php' are correct!
		
		//Builds the query
		$data = array(
			'title' => $t,
			'userid' => $uid,
			'firstname' => $fname,
			'lastname' => $lname,
			'middlename' => $mname,
			'address' => $addr,
			'state' => $state,
			'dob' => $dob,
			'postcode' => $pcode,
			'gender' => $gender
		);
		
		if ($isNew){
		//Executes + returns whether if successful (T for success, F for fail)
		return $this -> db -> insert('employees',$data);
		} else {
		$this->db->where('userid', $uid);
		$this->db->update('employees', $data); 
		return true;
}
	}
	
	function assign($empID, $subNo, $sDate, $eDate, $paidWeeks, $dayWeek,$sTime, $eTime, $rateID){
	
			//NOTE: Ensure that the settings in 'application/config/database.php' are correct!
			
			//Builds the query
			$data = array(
				'email' => $email,
				'firstname' => $firstname ,
				'lastname' => $lastname ,
				'password' => $password
			);
			
			//Executes + returns whether if successful (T for success, F for fail)
			return $this -> db -> insert('users',$data);

	}
	
	//Retrieves the ID of the person who last registered
}
?>