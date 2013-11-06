<title>RCIM - Create/Edit Details</title>

</head>

<body style="margin:70px 0 0 0;">
<div class="container">
    <ul id="tab" class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Main details</a></li>
        <li><a href="#tab2" data-toggle="tab">Financial Details</a></li>
        <li><a href="#tab3" data-toggle="tab">Citizenship Details</a></li>
		<li><a href="#tab4" data-toggle="tab">Emergency Contact</a></li>
    </ul>
    <div class="tab-content"style="text-align:center;">
        <div class="tab-pane fade in active" id="tab1" style="text-align:center;" >
			<?php
			if ($empData->FirstName == null)
				echo '<h1>Add your details</h1>';
			else
				echo '<h1>Edit your details</h1>';

			echo form_open('employee/register', $attributes);

			?>
			<table style="margin: 10px auto;width: 40%" class="table table-striped">
			<tr>
				<td>
					User ID
				</td>
				<td>
					<input type="text" name="userid" class="form-control" placeholder="Title" readOnly="true" value="<?php
			echo $empData->UserID;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Title
				</td>
				<td>
					<input type="text" name="title" class="form-control" placeholder="Title" value="<?php
			echo $empData->Title;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					First Name
				</td>
				<td>
					<input type="text" name="fname" class="form-control" placeholder="First name" value="<?php
			echo $empData->FirstName;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Middle Name
				</td>
				<td>
					<input type="text" name="mname" class="form-control" placeholder="Middle Name" value="<?php
			echo $empData->MiddleName;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Surname
				</td>
				<td>
					<input type="text" name="lname" class="form-control" placeholder="Surname" value="<?php
			echo $empData->LastName;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Address
				</td>
				<td>
					<input type="text" name="address" class="form-control" placeholder="Address" value="<?php
			echo $empData->Address;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					State
				</td>
				<td>
					<select name="state" class="form-control">
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
				if ($empData->State == $code)
					echo '<option value="' . $code . '" selected>' . $name . '</option>';
				else
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
					<input type="text" name="pcode" class="form-control" placeholder="Postcode" value="<?php
			echo $empData->Postcode;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Date of Birth
				</td>
				<td>
					<input type="date" name="dob" max="2010-01-01" class="form-control" placeholder="Date of Birth" value="<?php
			echo $empData->DOB;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Gender
				</td>
				<td>
					<input type="radio" name="gender" value="0" <?php
			if ($empData->Gender == 0)
				echo 'checked';
			?>>Male<br>
					<input type="radio" name="gender" value="1" <?php
			if ($empData->Gender == 1)
				echo 'checked';
			?>>Female
				</td>    
			</tr>
			<tr>
				<td>
					<input type="submit" class="btn btn-primary" value="Save"/>
					</td>
					<td>
					</form>
					<?php 
					echo form_open('employee/submit', $attributes); ?>
					<input type="submit" class="btn btn-primary" value="Submit"/>
					</form>
				</td>    
			</tr>
			</table>
			
        </div>
        <div class="tab-pane fade" id="tab2" style="text-align:center;">
		<?php
		echo validation_errors();
			$attributes = array(
				'class' => 'financial'
				
			);
			echo form_open('employee/financial', $attributes);

			?>
            <h1>Financial Details</h1>
			<table style="margin: 10px auto;width: 40%" class="table table-striped" >
			<tr>
				<td>
					User ID
				</td>
				<td>
					<input type="text" name="userid" class="form-control" placeholder="Title" readOnly="true" value="<?php
			echo $empData->UserID;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Institution Name
				</td>
				<td>
					<input type="text" name="institution" class="form-control" required="true" placeholder="Institution Name" value="<?php
			echo $fData->InstitutionName;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Branch Name
				</td>
				<td>
					<input type="text" name="branch" required="true" class="form-control" placeholder="Branch Name" value="<?php
			echo $fData->BranchName;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					BSB Number
				</td>
				<td>
					<input type="text" name="bsb" required="true" class="form-control" placeholder="BSB Number" value="<?php
			echo $fData->BSB;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Account Number
				</td>
				<td>
					<input type="text" name="accno" required="true" class="form-control" placeholder="Account Number" value="<?php
			echo $fData->AccountNo;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					<input id="fsubmit" type="submit" class="btn btn-primary finsubmit" value="Save"/>
				</td>
				<td>
				</td>    
			</tr>
			</table>
			</form>
        </div>
        <div class="tab-pane fade" id="tab3" style="text-align:center;">
		<?php echo validation_errors();
			$attributes = array(
				'class' => 'register'
			);
			echo form_open('employee/citizenship', $attributes);

			?>
			<h1>Citizenship Details</h1>
			<table style="margin: 10px auto;width: 40%" class="table table-striped">
			<tr>
				<td>
					User ID
				</td>
				<td>
					<input type="text" name="userid" class="form-control" placeholder="Title" readOnly="true" value="<?php
			echo $empData->UserID;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Citizenship Status
				</td>
				<td>
					<input type="text" name="status" class="form-control" required="true" placeholder="Citizenship Status" value="<?php
			echo $cData->CitizenshipStatus;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Visa Type
				</td>
				<td>
					<input type="text" name="vtype" class="form-control" placeholder="Visa Type" value="<?php
			echo $cData->VisaType;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Passport Number
				</td>
				<td>
					<input type="text" name="ppno" class="form-control" placeholder="Passport Number" value="<?php
			echo $cData->PassportNo;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Country Of Issue
				</td>
				<td>
					<input type="text" name="cissue" class="form-control" placeholder="Country of issue for the passport" value="<?php
			echo $cData->CountryOfIssue;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					<input type="submit" class="btn btn-primary" value="Save"/>
				</td>
				<td>
				</td>    
			</tr>
			</table>
			</form>
        </div>
		<div class="tab-pane fade" id="tab4" style="text-align:center;">
		<?php echo validation_errors();
			$attributes = array(
				'class' => 'register'
			);
			echo form_open('employee/emergency', $attributes);

			?>
			<h1>Emergency Contact</h1>
			<table style="margin: 10px auto;width: 40%" class="table table-striped">
			<tr>
				<td>
					User ID
				</td>
				<td>
					<input type="text" name="userid" class="form-control" placeholder="Title" readOnly="true" value="<?php
			echo $empData->UserID;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					GivenName
				</td>
				<td>
					<input type="text" name="gname" required="true" class="form-control" placeholder="Given Name" value="<?php
			echo $eData->GivenName;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Surname
				</td>
				<td>
					<input type="text" name="sname" required="true" class="form-control" placeholder="Surname" value="<?php
			echo $eData->Surname;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Relationship
				</td>
				<td>
					<input type="text" name="relation" required="true" class="form-control" placeholder="Relationship" value="<?php
			echo $eData->Relationship;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					DaytimeNumber
				</td>
				<td>
					<input type="number" name="ph" maxlength="10" required="true" class="form-control" placeholder="Daytime phone number" value="<?php
			echo $eData->DaytimeNumber;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					MobileNumber
				</td>
				<td>
					<input type="number" name="mob" maxlength="10" required="true" class="form-control" placeholder="Mobile number" value="<?php
			echo $eData->MobileNumber;
			?>">
				</td>    
			</tr>
			
			<tr>
				<td>
					<input type="submit" class="btn btn-primary" value="Save"/>
					
				</td>
				<td>
				</td>    
			</tr>
			</table>
			</form>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.7.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
<script>
</script>
</body>
</html>