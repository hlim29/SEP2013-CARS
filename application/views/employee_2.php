<head>
<title>Bootstrap Demo - Tabs</title>
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css';?>" rel="stylesheet" type="text/css">
</head>
<body>

<div class="container">
    <ul id="tab" class="nav nav-tabs">
        <li class="active"><a href="#tab1" data-toggle="tab">Tab 1</a></li>
        <li><a href="#tab2" data-toggle="tab">Tab 2</a></li>
        <li><a href="#tab3" data-toggle="tab">Tab 3</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade in active" id="tab1">
		<?php 
if ($empData->FirstName == null)
	echo '<h1>Add your details</h1>';
	else
	echo '<h1>Edit your details</h1>';


echo validation_errors(); 
	$attributes = array('class' => 'register');
	echo form_open('employee', $attributes); 

	?>
<table>
<tr>
	<td>
		Title
	</td>
	<td>
		<input type="text" name="title" placeholder="Title" value="<?php echo $empData->Title; ?>">
	</td>    
</tr>
<tr>
	<td>
		First Name
	</td>
	<td>
		<input type="text" name="fname" placeholder="First name" value="<?php echo $empData->FirstName; ?>">
	</td>    
</tr>
<tr>
	<td>
		Middle Name
	</td>
	<td>
		<input type="text" name="mname" placeholder="Middle Name" value="<?php echo $empData->MiddleName; ?>">
	</td>    
</tr>
<tr>
	<td>
		Surname
	</td>
	<td>
		<input type="text" name="lname" placeholder="Surname" value="<?php echo $empData->LastName; ?>">
	</td>    
</tr>
<tr>
	<td>
		Address
	</td>
	<td>
		<input type="text" name="address" placeholder="Address" value="<?php echo $empData->Address; ?>">
	</td>    
</tr>
<tr>
	<td>
		State
	</td>
	<td>
		<select name="state">
			<?php $states = array(
				"NSW"=>"New South Wales",
				"VIC"=>"Victoria",
				"QLD"=>"Queensland",
				"TAS"=>"Tasmania",
				"SA"=>"South Australia",
				"WA"=>"Western Australia",
				"NT"=>"Northern Territory",
				"ACT"=>"Australian Capital Territory");
			?>
			<option value="">Please select a state</option>
			<?php foreach($states as $code => $name){	
				if ($empData->State == $code)
					echo '<option value="'.$code.'" selected>'.$name.'</option>';
				else
					echo '<option value="'.$code.'">'.$name.'</option>';
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
		<input type="text" name="pcode" placeholder="Postcode" value="<?php echo $empData->Postcode; ?>">
	</td>    
</tr>
<tr>
	<td>
		Date of Birth
	</td>
	<td>
		<input type="date" name="dob" placeholder="Date of Birth" value="<?php echo $empData->DOB; ?>">
	</td>    
</tr>
<tr>
	<td>
		Gender
	</td>
	<td>
		<input type="radio" name="gender" value="0" <?php if ($empData->Gender == 0) echo 'checked'; ?>>Male<br>
		<input type="radio" name="gender" value="1" <?php if ($empData->Gender == 1) echo 'checked'; ?>>Female
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
</div>
        <div class="tab-pane fade" id="tab2">
            <p>Vivamus porttitor pretium arcu, sit amet commodo mi gravida nec. Etiam imperdiet, neque sodales sagittis egestas, justo nibh vulputate leo, eget venenatis ipsum justo sit amet mi. Etiam interdum urna id ipsum placerat sed ultricies arcu tincidunt. Fusce tincidunt hendrerit sagittis. Donec suscipit condimentum risus, venenatis porttitor dui adipiscing sed. Sed ac mauris quis justo commodo interdum id sit amet tortor. In hac habitasse platea dictumst. Donec convallis est quis ipsum suscipit interdum. Ut at metus odio. Nulla felis dolor, faucibus vel mollis at, adipiscing eget arcu. Aliquam semper urna non sapien sodales aliquam. Donec iaculis tristique aliquet. Duis cursus est a neque commodo pellentesque. Vestibulum eu est id tellus cursus aliquet et fringilla orci.</p>
        </div>
        <div class="tab-pane fade" id="tab3">
            <p>Mauris id mi nisi, et pulvinar erat. Donec tortor nunc, ultricies eu adipiscing eget, varius non quam. Integer ullamcorper arcu mi, eget porta arcu. Pellentesque sodales massa non augue vehicula a molestie tellus tincidunt. Vestibulum et sem velit. Duis in ligula porta magna gravida feugiat ut eu diam. Maecenas ut est id dolor ullamcorper aliquam ut sed est. Aliquam erat volutpat. Vestibulum mauris sapien, ultricies nec convallis tempor, pharetra fringilla orci. Aenean lacus odio, facilisis eu auctor sit amet, luctus vitae risus.</p>
        </div>
    </div>
</div>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js';?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.7.1.min.js';?>"></script>
</body>
</html>