<body style="padding-top:40px;text-align:center;">
<h1>Edit subject</h1>
<?php //echo validation_errors(); 
	echo form_open('subject/submit'); 
	?>
	
<table style="margin: 10px auto;width: 40%" class="table table-striped">
<tr>
	<td>
		Subject ID
	</td>
	<td>
		<input type="text" name="id" class="form-control" value="<?php echo $subject->SubjectID; ?>" readOnly="true">

	</td>    
</tr>
<tr>
	<td>
		Subject Name
	</td>
	<td>
		<input type="text" name="name" class="form-control" placeholder="Subject Name" value="<?php echo $subject->SubjectName; ?>" required="true">
	</td>    
</tr>
<tr>
	<td>
		Subject Coordinator
	</td>
	<td>
		<select name="coordinator" class="form-control" required="true">
		<option value="">Please select a coordinator</option>
		<?php
		foreach($coordinators->result() as $coordinator)
			if ($subject->SubjectCoordinator == $coordinator->UserID)
					echo '<option value="' . $coordinator->UserID . '" selected>' . $coordinator->FirstName . ' ' . $coordinator->LastName .'</option>';
				else
					echo '<option value="' . $coordinator->UserID . '">' . $coordinator->FirstName . ' ' . $coordinator->LastName . '</option>';
		?>
		</select>
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
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.7.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>