<body style="padding-top:40px;text-align:center;">
<h1>Register</h1>
<?php echo validation_errors(); 
	$attributes = array('class' => 'register');
	echo form_open('register', $attributes); ?>
<table style="margin: 10px auto;width: 40%" class="table table-striped">

<tr>
	<td>
		Email
	</td>
	<td>
		<input type="text" name="email" class="form-control" placeholder="Email address">
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
		First Name
	</td>
	<td>
		<input type="text" name="fname" class="form-control" placeholder="First name">
	</td>    
</tr>
<tr>
	<td>
		Surname
	</td>
	<td>
		<input type="text" name="lname" class="form-control" placeholder="Surname">
	</td>    
</tr>
<tr>
	<td>
	</td> 
	<td>
		<input type="submit" class="btn btn-primary" value="Submit"/>
	</td>
	   
</tr>
</table>
</form>
</body>