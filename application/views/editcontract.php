<body style="padding-top:40px;text-align:center;">
<h1>Edit Contract</h1>
<?php echo validation_errors(); 
	echo form_open('contract/submit'); 
	?>
	
<table style="margin: 10px auto;width: 40%" class="table table-striped">
<tr>
	<td>
		ContractID
	</td>
	<td>
		<input type="number" name="id" class="form-control" value="<?php 
		echo $contract->ContractNo;
		?>" readOnly="true">

	</td>    
</tr>
<tr>
	<td>
		Employee Name
	</td>
	<td>
		<input type="text" name="ename" class="form-control" value="<?php 
		echo $contract->FirstName . ' ' . $contract->LastName;
		?>" readOnly="true">

	</td>    
</tr>
<tr>
	<td>
		Start Date
	</td>
	<td>
		<input type="date" name="sdate" min="2013-11-01" class="form-control" placeholder="Start Date" value="<?php echo $contract->StartDate; ?>" required="true">
	</td>    
</tr>
<tr>
	<td>
		End Date
	</td>
	<td>
		<input type="date" name="edate" min="2013-11-01" class="form-control" placeholder="End Date" value="<?php echo $contract->EndDate; ?>" required="true">
	</td>    
</tr>
<tr>
	<td>
		Paid Weeks
	</td>
	<td>
		<input type="number" name="pweeks" min="0" class="form-control" placeholder="Number of paid weeks" value="<?php echo $contract->PaidWeeks; ?>" required="true">
	</td>    
</tr>
<tr>
	<td>
		Day Of Week
	</td>
	<td>
		<select name="day" class="form-control">
	<option>Select a day of the week</option>
		<?php
		$days = array(
			0 => 'Sunday',
			1 => 'Monday',
			2 => 'Tuesday',
			3 => 'Wednesday',
			4 => 'Thursday',
			5 => 'Friday',
			6 => 'Saturday'
			
		);
		foreach ($days as $day){
		if ($contract->DayOfWeek == $day)
			echo '<option value="' . $day . '" selected>' . $day . '</option>';
		else
			echo '<option value="' . $day . '">' . $day . '</option>';
			}
		?>
		</select>
	</td>    
</tr>
<tr>
	<td>
		Start Time
	</td>
	<td>
		<input type="time" name="stime" class="form-control" placeholder="Subject Name" value="<?php echo $contract->StartTime; ?>" required="true">
	</td>    
</tr>
<tr>
	<td>
		End Time
	</td>
	<td>
		<input type="time" name="etime" class="form-control" placeholder="Subject Name" value="<?php echo $contract->EndTime; ?>" required="true">
	</td>    
</tr>
<tr>
	<td>
		<a href="#" onclick="open_win()">Hourly Rate</a>
	</td>
	<td>
	<select name="rate" class="form-control">
	<option value="">Please select a rate level</option>
		<?php
		foreach ($rates->result() as $rate){
		if ($contract->HourlyRate == $rate->RateID)
			echo '<option value="' . $rate->RateID . '" selected>Level ' . $rate->LevelName . ' $' . $rate->PayRate . '</option>';
		else
			echo '<option value="' . $rate->RateID . '">Level ' . $rate->LevelName . ' $' . $rate->PayRate . '</option>';
			}
		?>
		</select>
	</td>    
</tr>
<tr>
	<td>
	</td> 
	<td>
		<input type="submit" class="btn btn-primary" value="Submit"/>
		<a href="<?php echo base_url().'index.php/contract/'?>"><button class="btn btn-danger">Cancel</button></a>
	</td>
	   
</tr>
</table>
</form>
</body>
<script>
function open_win() 
{
window.open("<?php echo base_url().'index.php/listview/rates' ?>");
}
</script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.7.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>