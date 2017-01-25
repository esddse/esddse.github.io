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

			# get Party_Num
			foreach ($_POST as $num){
				$query = "DELETE FROM party WHERE Party_Num=$num";
				$retval = mysql_query($query, $conn);
				if(! $retval){
					die('Could not delete data: '.mysql_error());
				}
			}


			# print the remaining
			echo "<br><br>Data remaining:<br><br>";

			$query = "SELECT * FROM party";
			$query = stripcslashes($query);

			$retval = mysql_query($query, $conn);

			if(! $retval){
				die('Could not enter data: '.mysql_error());
			}
			
			while($row = mysql_fetch_array($retval)){
				$output = "Party_Num={$row['Party_Num']}, ".
					 	 "Time={$row['Time']},".
					 	 "Place={$row['Place']},".
					 	 "Host_Name={$row['Host_Name']}";
				$output = htmlspecialchars($output)."<br><br>";
				echo $output;	
			}

			mysql_close($conn);
		 ?>
	</body>
</html>
