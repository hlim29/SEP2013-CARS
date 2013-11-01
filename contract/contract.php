<?php
include('connect.inc.php');

$subject_number=$_POST['subject_number'];
$employee_id=$_POST['employee_id'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$paid_weeks=$_POST['paid_weeks'];
$day_of_week=$_POST['day_of_week'];
$start_time=$_POST['start_time'];
$end_time=$_POST['end_time'];
$hourly_rate=$_POST['hourly_rate'];

$addingQuery="INSERT INTO `rcim`.`contracts` VALUES (NULL, '$subject_number', '$employee_id', '$start_date',
 '$end_date', '$paid_weeks', '$day_of_week', '$start_time', '$end_time', '$hourly_rate')";
 
if(mysqli_query($link,$addingQuery))
{
	echo "Successfull!";
}
else
{
	echo "Failed";
	echo mysqli_error($link);
}

?>
