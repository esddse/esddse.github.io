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

			foreach ($_POST as $att){
				$att = split(',', $att);
				$guest_id = $att[0];
				$party_num = $att[1];
				$query = "DELETE FROM guest_party WHERE Guest_ID=$guest_id AND Party_Num=$party_num";
				$retval = mysql_query($query, $conn);
				if(! $retval){
					die('Could not delete data: '.mysql_error());
				}
			}


			# print the remaining
			echo "<br><br>Data remaining:<br><br>";

			$query = "SELECT * FROM guest_party";
			$query = stripcslashes($query);

			$retval = mysql_query($query, $conn);

			if(! $retval){
				die('Could not enter data: '.mysql_error());
			}
			
			while($row = mysql_fetch_array($retval)){
				$output = "Guest_ID={$row['Guest_ID']}, ".
					 	 "Party_Num={$row['Party_Num']},";
				$output = htmlspecialchars($output)."<br><br>";
				echo $output;	
			}

			mysql_close($conn);
		 ?>
	</body>
</html>
