<title>RCIM - Subject List</title>

</head>
<body style="margin:70px auto;text-align:center;">
<h1>Your Subject List</h1>
<?php 
		echo '<table id="table" style="margin: 10px auto;width: 80%" class="table table-striped tablesorter">';
		echo '<thead><tr><th>Subject Name</th><th>Subject ID</th><th>Subject Coordinator</th><th>Status</th></tr> </thead><tbody>';
		foreach ($subjects->result() as $subject){
			echo '<tr>';
			echo '<td>' . $subject->SubjectName . '</td>' ;
			echo '<td>' . $subject->SubjectID . '</td>' ;
			echo '<td>' . $subject->FirstName . ' ' . $subject->LastName . '</td>' ;
			echo '<td>';
			if ($subject->Status==0) echo 'In progress';
			else if ($subject->Status==1) echo 'Rejected';
			else if ($subject->Status==2) echo 'Accepted';
			echo '</td>';
			echo '</tr>';
		}
		echo '</tbody></table>';

?>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-1.7.1.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.tablesorter.js'?>"></script>
<script>
  $(function() {
    $("#table").tablesorter({ sortList: [[1,0]] });
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

