<h1>Welcome to the member's area!</h2>
<?php echo $this->session->userdata('UserID'); 
//echo ($this->session->userdata('FormID');
//echo ($this->session->userdata('FormStatus');
?>
<?php if ($this->session->userdata('FormID') != $this->session->userdata('UserID')) 
		echo "You have no contracts. Create one <a href=\"employee\">here</a>"; 	
	else if ($this->session->userdata('FormStatus') == 0)
		echo "<a href=\"employee\">Edit</a> your existing contract";
	else
		echo "Employees area";

?>

<a href="main/logout">Logout</a>