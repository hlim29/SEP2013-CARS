<?php
Class Rates_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	function getRates(){
	return $this->db->get('rates');
	}
	
	function getRate($id){
		$this -> db -> select('*');
		$this -> db -> from('rates');
		$this->db->where('RateID',$id);
		$query = $this->db->get();
		return $query -> row();
	}
	
	function updateRate($id, $level, $type, $desc, $amount){
		$data = array(
			'levelname' => $level, 
			'type' => $type, 
			'description' => $desc, 
			'payrate' => $amount
			);
			
			$this->db->where('rateid', $id);
			return $this->db->update('rates', $data); 
			//return true;
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