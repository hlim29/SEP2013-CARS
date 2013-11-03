<?php
Class User_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	function register($email, $firstname, $lastname, $password){
	
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
}
?>