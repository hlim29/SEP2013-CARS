<?php
Class Employee_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	function getEmployee($userID){
		$this->db->where('UserID',$userID);
		$query = $this->db->get('employees');
		if ($query->num_rows() > 0)
			return ($query->row());
		else
			return null;
	}
	
	function register($t, $uid, $fname, $mname, $lname, $addr, $state, $pcode, $dob, $gender){

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
			'postcode' => $pcode,
			'gender' => $gender
		);
		
		//Executes + returns whether if successful (T for success, F for fail)
		return $this -> db -> insert('employees',$data);

	}
	
		function update($t, $uid, $fname, $mname, $lname, $addr, $state, $pcode, $dob, $gender){

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
			'postcode' => $pcode,
			'gender' => $gender
		);
		
		$this->db->where('userid', $uid);
		$this->db->update('employees', $data); 
		return true;
		//Executes + returns whether if successful (T for success, F for fail)

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