<head>
	<title>UTS Casual Employees System</title>

</head>


<body style="margin:70px 0 0 0;text-align:center;">
<h1>Welcome to the RCIM system!</h1>
<h2>Login here</h2>
<?php 

	$this->load->helper('url');
	echo validation_errors(); 
	//$attributes = array('class' => 'login');
	echo form_open('main'); 
	?>
<table style="margin: 10px auto;">

<tr>
	<td>
		User ID
	</td>
	<td>
		<input type="text" name="id" class="form-control" placeholder="User ID">
	</td>    
</tr>
<tr>
	<td>
		Password
	</td>
	<td>
		<input type="password" name="password" class="form-control" placeholder="Password">
	</td>    
</tr>
<tr>
	<td>
		<input type="submit" class="btn btn-primary" value="Login"/>
	</td>
	<td>
	</td>    
</tr>
</table>
</form>
Don't have an account? Create one <a href="<?php echo base_url("index.php/register");?>">here</a>
<!--To register, click <a href="<?php echo base_url("index.php/register");?>">here</a>
To login, click <a href="<?php echo base_url("index.php/login");?>">here</a>-->

</body>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.7.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>