<?php
Class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	function register($email, $password){
	
			//NOTE: Ensure that the settings in 'application/config/database.php' are correct!
			
			//Builds the query
			$data = array(
				'email' => $email,
				'password' => $password
			);
			
			//Executes + returns whether if successful (T for success, F for fail)
			return $this -> db -> insert('users',$data);

	}
	
	function adminRegister($email, $password){
	
		//NOTE: Ensure that the settings in 'application/config/database.php' are correct!
		
		//Builds the query
		$data = array(
			'email' => $email,
			'password' => $password
		);
		
		//Executes + returns whether if successful (T for success, F for fail)
		$this -> db -> insert('users',$data);
		return $this->db->insert_id();
	}
	
	//Retrieves the ID of the person who last registered
	function getLastRegistered(){
		return $this->db->insert_id();
	}
	
	public function login($id, $password){
		$this -> db -> select('userid, password');
		$this -> db -> from('users');
		$this->db->where('UserID',$id);
		$this->db->where('Password',md5($password));
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
			return $query->result();
		else
			return false;
	}
	
	public function getAllUserData(){
		$this -> db -> select('*');
		$this -> db -> from('users');
		$this->db->join('employees', 'employees.userid = users.userid');
		return $this->db->get();
	}
}
?>