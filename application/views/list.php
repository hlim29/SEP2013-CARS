<title>RCIM - Subject List</title>

</head>
<body style="margin:70px auto;text-align:center;">
<h1>Subject List</h1>
<?php 
		echo '<table id="table" style="margin: 10px auto;width: 80%" class="table table-striped tablesorter">';
		echo '<thead><tr><th>Subject Name</th><th>Subject ID</th><th>Subject Coordinator</th><th>Actions</th></tr> </thead><tbody>';
		foreach ($subjects->result() as $subject){
			echo '<tr>';
			echo '<td>' . $subject->SubjectName . '</td>' ;
			echo '<td>' . $subject->SubjectID . '</td>' ;
			echo '<td>' . $subject->FirstName . ' ' . $subject->LastName . '</td>' ;
			echo '<td>' . '<a href="' . $subject->SubjectID . '">Contact</a></td>';
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
</script>
</body>

