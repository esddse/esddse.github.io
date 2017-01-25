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
			$party_num = addslashes($_REQUEST['party']);

			# insert into guest
			$query = "INSERT INTO guest ".
					 "(Guest_Name, Age, Gender, E_mail) ".
					 "VALUES ". 
					 "('$name', '$age', '$gender', '$e_mail');";

			mysql_select_db('db_2016_166');
			$retval = mysql_query($query, $conn);
			if(! $retval){
				die('Could not enter data: '.mysql_error());
			}

			# get guest id
			$query = "SELECT Guest_ID FROM guest WHERE Guest_Name='$name'AND Age='$age' AND Gender='$gender' AND E_mail='$e_mail'";
			$query = stripcslashes($query);
			$retval = mysql_query($query, $conn);

			if(! $retval){
				die('Could not enter data: '.mysql_error());
			}
			
			$row = mysql_fetch_array($retval);
			$guest_id = $row['Guest_ID'];
		
			# insert into guest_party
			$query = "INSERT INTO guest_party ".
					 "(Guest_ID, Party_Num) ".
					 "VALUES ". 
					 "('$guest_id', '$party_num')";

			$retval = mysql_query($query, $conn);

			if(! $retval){
				die('Could not enter data: '.mysql_error());
			}

			echo "<br><br>Entered data successfully\n";

			mysql_close($conn);
		 ?>
	</body>
</html>
