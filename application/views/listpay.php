<title>RCIM - Subject List</title>

</head>
<body style="margin:70px auto;text-align:center;">
<h1>View Pay Rates</h1>
<?php 
if ($msg)
	echo '<div class="alert alert-success" style="width:30%;margin:30px auto;">'. $msg .'</div>';
	
		echo '<table id="table" style="margin: 10px auto;width: 80%" class="table table-striped tablesorter">';
		echo '<thead><tr><th>Rate ID</th><th>Level</th><th>Description</th><th>Rate</th>';
		if ($this->session->userdata('Privilege')==3)
			echo '<th>Delete</th><th>Edit</th>';
		echo '</tr> </thead><tbody>';
		foreach ($rates->result() as $rate){
			echo '<tr>';
			echo '<td>' . $rate->RateID . '</td>' ;
			echo '<td>' . $rate->LevelName . '</td>' ;
			echo '<td>' . $rate->Description . '</td>' ;
			echo '<td>$' . $rate->PayRate  . '</td>';
			if ($this->session->userdata('Privilege')==3){
			echo '<td><input type=checkbox></input></td>';
			echo '<td><a href="' . base_url('index.php/rates/edit/'.$rate->RateID) . '">Edit</a></td>';
			}
			echo '</tr>';
		}
		echo '</tbody></table>';

?>
<?php if ($this->session->userdata('Privilege')==3) { ?>
<a href="<?php echo base_url().'index.php/rates/edit'?>"><button class="btn btn-primary">Create a new pay rate</button></a>
<input type="submit" class="btn btn-danger" value="Delete checked rates"/>
<?php } ?>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.7.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.tablesorter.js'?>"></script>
<script>
  $(function() {
    $("#table").tablesorter({ sortList: [[0,0]] });
  });
  	$('.request').click(function(event) {
		event.preventDefault();
        var deleteConfirm = confirm('Are you sure you want to send a request to this coordinator?');
		if (deleteConfirm == true) {
			var id = $(this).attr('id');

			$.post( "listview/send", { subjectid: id });
		}					
    });
</script>
</script>
</body>

