<?php
     $connection=new mysqli("localhost","root","","restaurant");
    if(isset($_GET['M_ID'])) {
        $sql = "SELECT * FROM meal WHERE M_ID=" . $_GET['M_ID'];
		$result = mysqli_query($connection, $sql);
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["Icon_Type"]);
		echo $row["Icon"];
		echo $row["Name"];
	}
	mysqli_close($connection);
?>