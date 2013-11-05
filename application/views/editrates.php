<body style="padding-top:40px;text-align:center;">
<h1>Edit rates</h1>
<?php //echo validation_errors(); 
	echo form_open('rates/submit'); 
	?>
	
<table style="margin: 10px auto;width: 40%" class="table table-striped">
<input hidden type="text" name="id" value="<?php echo $rate->RateID; ?>">
<tr>
	<td>
		Level
	</td>
	<td>
		<input type="number" name="level" class="form-control" min=0 placeholder="Level number" value="<?php echo $rate->LevelName; ?>" required="true">
	</td>    
</tr>
<tr>
	<td>
		Type
	</td>
	<td>
		<input type="text" name="type" class="form-control" placeholder="Type" value="<?php echo $rate->Type; ?>" required="true">
	</td>    
</tr>
<tr>
	<td>
		Description
	</td>
	<td>
		<textarea rows="4" cols="30" name="desc" class="form-control" placeholder="Description" required="true"><?php echo $rate->Description; ?></textarea>
	</td>    
</tr>
<tr>
	<td>
		Rate amount
	</td>
	<td>
		<input type="number" step="any" name="amount" class="form-control" placeholder="Amount" value="<?php echo $rate->PayRate; ?>" required="true">
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