<title>RCIM - Create/Edit Your Details</title>

</head>

<body style="margin:70px 0 0 0;">
			<?php

			echo validation_errors();
			$attributes = array(
				'class' => 'register'
			);
			echo form_open('adminregister', $attributes);

			?>
			<table style="margin: 10px auto;width: 40%" class="table table-striped">
<tr>
	<td>
		<h3>Login information</h3>
	</td>
	<td>
	</td>    
</tr>
<tr>
	<td>
		Email
	</td>
	<td>
		<input type="text" name="email" class="form-control" placeholder="Email address" required="true">
	</td>    
</tr>
<tr>
	<td>
		Password
	</td>
	<td>
		<input type="password" name="password" class="form-control" placeholder="Password" required="true">
	</td>    
</tr>
<tr>
	<td>
		Confirm password
	</td>
	<td>
		<input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required="true">
	</td>    
</tr>
			<tr>
				<td>
					<h3>Employee Details</h3>
				</td>
				<td>
				</td>    
			</tr>
			<tr>
				<td>
					Title
				</td>
				<td>
					<input type="text" name="title" class="form-control" placeholder="Title" required="true">
				</td>    
			</tr>
			<tr>
				<td>
					First Name
				</td>
				<td>
					<input type="text" name="fname" class="form-control" placeholder="First name" required="true">
				</td>    
			</tr>
			<tr>
				<td>
					Middle Name
				</td>
				<td>
					<input type="text" name="mname" class="form-control" placeholder="Middle Name" required="true">
				</td>    
			</tr>
			<tr>
				<td>
					Surname
				</td>
				<td>
					<input type="text" name="lname" class="form-control" placeholder="Surname" required="true">
				</td>    
			</tr>
			<tr>
				<td>
					Address
				</td>
				<td>
					<input type="text" name="address" class="form-control" placeholder="Address" required="true">
				</td>    
			</tr>
			<tr>
				<td>
					State
				</td>
				<td>
					<select name="state" class="form-control" required="true">
						<?php
			$states = array(
				"NSW" => "New South Wales",
				"VIC" => "Victoria",
				"QLD" => "Queensland",
				"TAS" => "Tasmania",
				"SA" => "South Australia",
				"WA" => "Western Australia",
				"NT" => "Northern Territory",
				"ACT" => "Australian Capital Territory"
			);
			?>
						<option value="">Please select a state</option>
						<?php
			foreach ($states as $code => $name) {
					echo '<option value="' . $code . '">' . $name . '</option>';
			}
			?>
						
					</select>
				</td>    
			</tr>
			<tr>
				<td>
					Postcode
				</td>
				<td>
					<input type="text" name="pcode" class="form-control" required="true" placeholder="Postcode">
				</td>    
			</tr>
			<tr>
				<td>
					Date of Birth
				</td>
				<td>
					<input type="date" name="dob" class="form-control" required="true" placeholder="Date of Birth">
				</td>    
			</tr>
			<tr>
				<td>
					Gender
				</td>
				<td>
					<input type="radio" name="gender" value="0" checked>Male<br>
					<input type="radio" name="gender" value="1">Female
				</td>    
			</tr>
<tr><td>
            <h3>Financial Details</h3></td><td></td>
			</tr>
			<tr>
				<td>
					Institution Name
				</td>
				<td>
					<input type="text" name="institution" class="form-control" required="true" placeholder="Institution Name">
				</td>    
			</tr>
			<tr>
				<td>
					Branch Name
				</td>
				<td>
					<input type="text" name="branch" required="true" class="form-control" placeholder="Branch Name">
				</td>    
			</tr>
			<tr>
				<td>
					BSB Number
				</td>
				<td>
					<input type="text" name="bsb" required="true" class="form-control" placeholder="BSB Number">
				</td>    
			</tr>
			<tr>
				<td>
					Account Number
				</td>
				<td>
					<input type="text" name="accno" required="true" class="form-control" placeholder="Account Number">
				</td>    
			</tr>
			
<tr><td>
            <h3>Citizenship Details</h3></td><td></td>
			</tr>
			<tr>
				<td>
					Citizenship Status
				</td>
				<td>
					<input type="text" name="status" class="form-control" required="true" placeholder="Citizenship Status">
				</td>    
			</tr>
			<tr>
				<td>
					Visa Type
				</td>
				<td>
					<input type="text" name="vtype" class="form-control" placeholder="Visa Type">
				</td>    
			</tr>
			<tr>
				<td>
					Passport Number
				</td>
				<td>
					<input type="text" name="ppno" class="form-control" placeholder="Passport Number">
				</td>    
			</tr>
			<tr>
				<td>
					Country Of Issue
				</td>
				<td>
					<input type="text" name="cissue" class="form-control" placeholder="Country of issue for the passport">
				</td>    
			</tr>
			
<tr><td>
            <h3>Emergency Contact</h3></td><td></td>
			</tr>
			<tr>
				<td>
					GivenName
				</td>
				<td>
					<input type="text" name="gname" required="true" class="form-control" placeholder="Given Name">
				</td>    
			</tr>
			<tr>
				<td>
					Surname
				</td>
				<td>
					<input type="text" name="sname" required="true" class="form-control" placeholder="Surname">
				</td>    
			</tr>
			<tr>
				<td>
					Relationship
				</td>
				<td>
					<input type="text" name="relation" required="true" class="form-control" placeholder="Relationship">
				</td>    
			</tr>
			<tr>
				<td>
					DaytimeNumber
				</td>
				<td>
					<input type="text" name="ph" required="true" class="form-control" placeholder="Daytime phone number">
				</td>    
			</tr>
			<tr>
				<td>
					MobileNumber
				</td>
				<td>
					<input type="text" name="mob" required="true" class="form-control" placeholder="Mobile number">
				</td>    
			</tr>
			
			<tr>
				<td>
					<input type="submit" class="btn btn-primary" value="Register"/>
					
				</td>
				<td>
				</td>    
			</tr>
			</table>
			</form>
   
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.7.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
<script>
</script>
</body>
</html>