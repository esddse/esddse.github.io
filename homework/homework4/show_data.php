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

			$query = "SELECT * FROM guest";

			mysql_select_db('db_2016_166');
			$retval = mysql_query($query, $conn);

			if(! $retval){
				die('Could not enter data: '.mysql_error());
			}
			
			echo "<br><br>";
			echo "<form method=\"post\" action=\"delete_guest.php\">";
			$i = 0;
			while($row = mysql_fetch_array($retval)){
				$output = "Guest_ID={$row['Guest_ID']}, ".
					 	 "Guest_Name={$row['Guest_Name']},".
					 	 "Age={$row['Age']},".
					 	 "Gender={$row['Gender']},".
					 	 "E_mail={$row['E_mail']}";
				$output = "<input type=\"checkbox\" name=\"item$i\", value=\"{$row['Guest_ID']}\">".htmlspecialchars($output)."<br><br>";
				echo $output;
				$i = $i + 1;
			}
			echo "<input type=\"submit\", value=\"delete\">";
			echo "</form>";
			mysql_close($conn);
		 ?>
	</body>
</html>
