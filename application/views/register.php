<h1>Register</h1>
<?php echo validation_errors(); 
	$attributes = array('class' => 'register');
	echo form_open('register', $attributes); ?>
<table>

<tr>
	<td>
		Email
	</td>
	<td>
		<input type="text" name="email" placeholder="Email address">
	</td>    
</tr>
<tr>
	<td>
		Password
	</td>
	<td>
		<input type="password" name="password" placeholder="Password">
	</td>    
</tr>
<tr>
	<td>
		First Name
	</td>
	<td>
		<input type="text" name="fname" placeholder="First name">
	</td>    
</tr>
<tr>
	<td>
		Surname
	</td>
	<td>
		<input type="text" name="lname" placeholder="Surname">
	</td>    
</tr>
<tr>
	<td>
		<input type="submit" value="Submit"/>
	</td>
	<td>
	</td>    
</tr>
</table>
</form>