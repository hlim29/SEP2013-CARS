<title>RCIM - Create/Edit Your Details</title>

</head>
<body style="margin:70px auto;text-align:center;">
<h1>Welcome to the member's area!</h2>
<?php //echo $this->session->userdata('UserID'); 
if ($saved==1){
echo '<div class="alert alert-success" style="width:30%;margin:30px auto;">Your details have been successfully saved</div>';
}

 if ($this->session->userdata('FormID') != $this->session->userdata('UserID')) 
		echo "You have no contracts. Create one <a href=\"employee\">here</a>"; 	
	else if ($this->session->userdata('FormStatus') == 0)
		echo '<a href="'. base_url('index.php/employee') . '">Edit/Submit</a> your existing contract';
	else
		echo "Employees area";

?>


</body>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.7.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>