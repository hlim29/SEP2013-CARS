<title>RCIM - Create/Edit Your Details</title>

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
			<table style="margin: 10px auto;width: 40%" class="table table-striped">
			<tr>
				<td>
					Title
				</td>
				<td>
					<input type="text" disabled="true" disabled="true" name="title" class="form-control" value="<?php
			echo $empData->Title;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					First Name
				</td>
				<td>
					<input type="text" disabled="true" name="fname" class="form-control" value="<?php
			echo $empData->FirstName;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Middle Name
				</td>
				<td>
					<input type="text" disabled="true" name="mname" class="form-control" value="<?php
			echo $empData->MiddleName;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Surname
				</td>
				<td>
					<input type="text" disabled="true" name="lname" class="form-control" value="<?php
			echo $empData->LastName;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Address
				</td>
				<td>
					<input type="text" disabled="true" name="address" class="form-control" value="<?php
			echo $empData->Address;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					State
				</td>
				<td>
					<select name="state" class="form-control" disabled="true">
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
					<input type="text" disabled="true" name="pcode" class="form-control" value="<?php
			echo $empData->Postcode;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Date of Birth
				</td>
				<td>
					<input type="date" disabled="true" name="dob" class="form-control" value="<?php
			echo $empData->DOB;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Gender
				</td>
				<td>
					<input type="radio" name="gender" value="0" disabled="true" <?php
			if ($empData->Gender == 0)
				echo 'checked';
			?>>Male<br>
					<input type="radio" name="gender" value="1" disabled="true" <?php
			if ($empData->Gender == 1)
				echo 'checked';
			?>>Female
				</td>    
			</tr>
			<tr>
				<td>

				</td>    
			</tr>
			</table>
			
        </div>
        <div class="tab-pane fade" id="tab2" style="text-align:center;">
		
            <h1>Financial Details</h1>
			<table style="margin: 10px auto;width: 40%" class="table table-striped" >
			<tr>
				<td>
					Institution Name
				</td>
				<td>
					<input type="text" disabled="true" name="institution" class="form-control" required="true" value="<?php
			echo $fData->InstitutionName;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Branch Name
				</td>
				<td>
					<input type="text" disabled="true" name="branch" required="true" class="form-control" value="<?php
			echo $fData->BranchName;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					BSB Number
				</td>
				<td>
					<input type="text" disabled="true" name="bsb" required="true" class="form-control" value="<?php
			echo $fData->BSB;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Account Number
				</td>
				<td>
					<input type="text" disabled="true" name="accno" required="true" class="form-control" value="<?php
			echo $fData->AccountNo;
			?>">
				</td>    
			</tr>
			<tr>
				<td>

				</td>
				<td>
				</td>    
			</tr>
			</table>

        </div>
        <div class="tab-pane fade" id="tab3" style="text-align:center;">
		
			<h1>Citizenship Details</h1>
			<table style="margin: 10px auto;width: 40%" class="table table-striped">
			<tr>
				<td>
					Citizenship Status
				</td>
				<td>
					<input type="text" disabled="true" name="status" class="form-control" required="true" value="<?php
			echo $cData->CitizenshipStatus;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Visa Type
				</td>
				<td>
					<input type="text" disabled="true" name="vtype" class="form-control" value="<?php
			echo $cData->VisaType;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Passport Number
				</td>
				<td>
					<input type="text" disabled="true" name="ppno" class="form-control" value="<?php
			echo $cData->PassportNo;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Country Of Issue
				</td>
				<td>
					<input type="text" disabled="true" name="cissue" class="form-control" value="<?php
			echo $cData->CountryOfIssue;
			?>">
				</td>    
			</tr>
			<tr>
				<td>

				</td>
				<td>
				</td>    
			</tr>
			</table>

        </div>
		<div class="tab-pane fade" id="tab4" style="text-align:center;">

			<h1>Emergency Contact</h1>
			<table style="margin: 10px auto;width: 40%" class="table table-striped">
			<tr>
				<td>
					GivenName
				</td>
				<td>
					<input type="text" disabled="true" name="gname" required="true" class="form-control" value="<?php
			echo $eData->GivenName;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Surname
				</td>
				<td>
					<input type="text" disabled="true" name="sname" required="true" class="form-control" value="<?php
			echo $eData->Surname;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					Relationship
				</td>
				<td>
					<input type="text" disabled="true" name="relation" required="true" class="form-control" value="<?php
			echo $eData->Relationship;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					DaytimeNumber
				</td>
				<td>
					<input type="text" disabled="true" name="ph" required="true" class="form-control" value="<?php
			echo $eData->DaytimeNumber;
			?>">
				</td>    
			</tr>
			<tr>
				<td>
					MobileNumber
				</td>
				<td>
					<input type="text" disabled="true" name="mob" required="true" class="form-control" value="<?php
			echo $eData->MobileNumber;
			?>">
				</td>    
			</tr>
			
			<tr>
				<td>
					
				</td>
				<td>
				</td>    
			</tr>
			</table>

        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.7.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
<script>
</script>
</body>
</html>