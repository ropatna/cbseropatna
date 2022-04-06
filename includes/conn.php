<?php
	$conn = mysqli_connect('localhost','root','','cbse');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
<?php include 'includes/sqlconn.php'; ?>
