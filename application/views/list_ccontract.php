<title>RCIM - Subject List</title>

</head>
<body style="margin:70px auto;text-align:center;">
<h1>Subject List</h1>
<center>In order to approve a contract, you must complete the form.</center>
<?php 
		echo '<table id="table" style="margin: 10px auto;width: 80%" class="table table-striped tablesorter">';
		echo '<thead><tr><th>Subject Name</th><th>Subject ID</th><th>Employee</th><th>Actions</th></tr> </thead><tbody>';
		foreach ($contracts->result() as $contract){
			if ($contract->Status == 0){
			echo '<tr>';
			echo '<td>' . $contract->SubjectName . '</td>' ;
			echo '<td>' . $contract->SubjectID . '</td>' ;
			echo '<td>' . '<a href="'. base_url() .'index.php/employee/cview/' . $contract->UserID . '">' . $contract->FirstName . ' ' . $contract->LastName . '</a></td>' ;
			echo '<td>' . '<a href="'. base_url() .'index.php/contract/edit/' . $contract->ContractNo . '">Complete contract form</a>';

			echo ' | ';
			echo '<a href="#" id=' . $contract->ContractNo . ' class="request">Reject</a>';
			
			if ($contract->StartDate){
				echo ' | ';
				echo '<a href="#" id=' . $contract->ContractNo . ' class="request">Approve</a>';
			}
			echo '</td>';
			echo '</tr>';
			}
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
        var deleteConfirm = confirm('Are you sure you want to approve this request?');
		if (deleteConfirm == true) {
			var id = $(this).attr('id');

			$.post( "contract/approve", { id: id });
		}					
    });
	  	/*$('.reject').click(function(event) {
		event.preventDefault();
        var deleteConfirm = confirm('Are you sure you want to reject this request?');
		if (deleteConfirm == true) {
			var id = $(this).attr('id');

			$.post( "contract/reject", { id: id });
		}					
    });*/
</script>
</script>
</body>

