<h1>Please login to continue</h1>

<?php echo validation_errors(); 
	$attributes = array('class' => 'login');
	echo form_open('login', $attributes); ?>
<table>

<tr>
	<td>
		User ID
	</td>
	<td>
		<input type="text" name="id" placeholder="Email address">
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
		<input type="submit" value="Submit"/>
	</td>
	<td>
	</td>    
</tr>
</table>
</form>