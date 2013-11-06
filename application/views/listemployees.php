<title>RCIM - Subject List</title>

</head>
<body style="margin:70px auto;text-align:center;">
<h1>Users List</h1>
<?php 
		echo '<table id="table" style="margin: 10px auto;width: 80%" class="table table-striped tablesorter">';
		echo '<thead><tr><th>User ID</th><th>Email</th><th>Name</th><th>Actions</th></tr> </thead><tbody>';
		foreach ($users->result() as $user){
			echo '<tr>';
			echo '<td>' . $user->UserID . '</td>' ;
			echo '<td>' . $user->Email . '</td>' ;
			echo '<td>' . $user->FirstName . ' ' . $user->LastName . '</td>' ;
			echo '<td>' . '<a href="listview/send" class="request" id="' . $subject->SubjectID . '">Deactivate</a>';
			echo ' | ';
			echo '<a href="' . base_url() .'index.php/employee/adminview/' . $user->UserID . '">Edit details</a></td>';
			echo '</tr>';
		}
		echo '</tbody></table>';

?>
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

