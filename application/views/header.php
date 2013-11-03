
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php
	echo base_url('assets/ico/favicon.png'); ?>">



    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>"  rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
 

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
        <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url('index.php'); ?>">RCIM</a>
        </div>
		
		<ul class="nav navbar-nav">
		   <?php 
          if($this->session->userdata('is_logged_in'))
          {
            ?>
            <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Your details<b class="caret"></b></a>
        <ul class="dropdown-menu">
			<?php if ($this->session->userdata('FormID') != $this->session->userdata('UserID')) { ?>
          <li><a href="<?php echo base_url('index.php/employee'); ?>">Add your details</a></li>
			<?php }else if ($this->session->userdata('FormStatus')==1){?>
			<li><a href="<?php echo base_url('index.php/employee/view'); ?>">View details</a></li>
			<?php }else{ ?>
				<li><a href="<?php echo base_url('index.php/employee'); ?>">Edit details</a></li>
			<?php } ?>
        </ul>
          </li>

          <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contracts<b class="caret"></b></a>
        <ul class="dropdown-menu">
			<li><a href="<?php echo base_url('index.php/listview'); ?>">Create a new contract</a></li>
          <li><a href="<?php echo base_url('index.php/'); ?>">View contracts</a></li>
          
        </ul>
          </li>
			<?php if ($this->session->userdata('privilege')==3){?>
          <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url('index.php/#'); ?>">Register Account</a></li>
          <li><a href="<?php echo base_url('index.php/#'); ?>">View Users</a></li>
          <li><a href="<?php echo base_url('index.php/#'); ?>">My Account</a></li>
        </ul>
          </li>
			<?php } ?>
			<?php } ?>


          <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">FAQ</a></li>
          <li><a href="#">Help</a></li>
        </ul>
          </li>
          </ul>
		  
		  <?php  ?>
           <?php 
          if($this->session->userdata('is_logged_in'))
          {
            echo '<a style="float:right; margin-top: 8px" href="' . base_url()."index.php/main/logout" . '">' . '<button style="float:right" type="submit" class="btn btn-default">Logout</button></a>';
          }
           ?>
    </div>
	</div>





    <!-- Placed at the end of the document so the pages load faster -->



