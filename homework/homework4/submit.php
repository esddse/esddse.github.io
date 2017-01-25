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

			$name = addslashes($_REQUEST['name']);
			$age = addslashes($_REQUEST['age']);
			$gender = addslashes($_REQUEST['gender']);
			$e_mail = addslashes($_REQUEST['e_mail']);

			$query = "INSERT INTO guest ".
					 "(Guest_Name, Age, Gender, E_mail) ".
					 "VALUES ". 
					 "('$name', '$age', '$gender', '$e_mail');";

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
