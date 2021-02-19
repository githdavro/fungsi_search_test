<?php
// include database connection file
error_reporting(0);
$connect = mysqli_connect("localhost", "root", "", "telp");

// Get id from URL to delete that user
$no = $_GET['no'];

// Delete user row from table based on given id
$result = mysqli_query($connect, "DELETE FROM contact WHERE no=$no");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:index.php");
