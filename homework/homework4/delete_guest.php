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

			mysql_select_db('db_2016_166');

			# get Gueat_ID
			foreach ($_POST as $id){
				$query = "DELETE FROM guest WHERE Guest_ID=$id";
				$retval = mysql_query($query, $conn);
				if(! $retval){
					die('Could not delete data: '.mysql_error());
				}
			}


			# print the remaining
			echo "<br><br>Data remaining:<br><br>";

			$query = "SELECT * FROM guest";
			$query = stripcslashes($query);

			mysql_select_db('db_2016_166');
			$retval = mysql_query($query, $conn);

			if(! $retval){
				die('Could not enter data: '.mysql_error());
			}
			
			while($row = mysql_fetch_array($retval)){
				$output = "Guest_ID={$row['Guest_ID']}, ".
					 	 "Guest_Name={$row['Guest_Name']},".
					 	 "Age={$row['Age']},".
					 	 "Gender={$row['Gender']},".
					 	 "E_mail={$row['E_mail']}";
				$output = htmlspecialchars($output)."<br><br>";
				echo $output;	
			}

			mysql_close($conn);
		 ?>
	</body>
</html>
