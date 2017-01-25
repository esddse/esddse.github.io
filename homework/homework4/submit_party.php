<html>
	<head>
		<title>Thank you!</title>
	</head>

	<body>
		<?php 
			$dbhost = 'localhost:8166';
			$dbusr = 'usr_2016_166';
			$dbpwd = 'esddse000178';
			$conn = mysql_connect($dbhost, $dbusr, $dbpwd);
			if(! $conn){
				die('Could not connect: '.mysql_error());
			}

			$time = addslashes($_REQUEST['time']);
			$place = addslashes($_REQUEST['place']);
			$host_name = addslashes($_REQUEST['host_name']);

			$query = "INSERT INTO party ".
					 "(Time, Place, Host_Name) ".
					 "VALUES ". 
					 "('$time', '$place', '$host_name');";

			mysql_select_db('db_2016_166');
			$retval = mysql_query($query, $conn);
			if(! $retval){
				die('Could not enter data: '.mysql_error());
			}

			echo "<br><br>Entered data successfully\n";

			mysql_close($conn);
		 ?>
	</body>
</html>
