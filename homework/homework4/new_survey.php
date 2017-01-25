<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>A Simple Survey</title>
	<style type="text/css">
		.content{
			margin: 200px 400px;
		}
		.wrap{
			padding: 20px;
			width: 500px;  
			border: 7px solid #096;
		}
		.wrap form{
			width: 100%;
		}
	</style>
</head>

<body>
<div class="content">
<div class="wrap">
	<form method="get" action="new_submit.php">
		<h2>FOR GUEST:</h2>
		Name: <br>
		<input type="text" name="name" value="Your Name"><br><br>
		Age: <br>
		<input type="text" name="age" value="Your Age"><br><br>
		Gender: <br>
		<input type="radio" name="gender" value="male" checked>Male
		<input type="radio" name="gender" value="female">Female<br><br>
		E-mail address: <br>
		<input type="text" name="e_mail" value="you@example.com"><br><br>
		Party you wanna go: <br>
		<?php 
			$dbhost = 'localhost:8166';
			$dbusr = 'usr_2016_166';
			$dbpwd = 'esddse000178';
			$conn = mysql_connect($dbhost, $dbusr, $dbpwd);
			if(! $conn){
				die('Could not connect: '.mysql_error());
			}

			$query = "SELECT * FROM party";

			mysql_select_db('db_2016_166');
			$retval = mysql_query($query, $conn);

			if(! $retval){
				die('Could not enter data: '.mysql_error());
			}

			$i = 0;
			while($row = mysql_fetch_array($retval)){
				$output = "Time={$row['Time']},".
					 	 "Place={$row['Place']}";
				if($i == 0){
					$output = "<input type=\"radio\" name=\"party\", value=\"{$row['Party_Num']}\" checked>".htmlspecialchars($output)."<br><br>";
					$i = 1;
				}
				else {
					$output = "<input type=\"radio\" name=\"party\", value=\"{$row['Party_Num']}\">".htmlspecialchars($output)."<br><br>";
				}
				
				echo $output;
			}

			mysql_close($conn);
		 ?>

		 <input type="submit" value="submit"><br><br>
	</form>		
	<hr>
	<form method="get" action="submit_party.php">
		<h2>FOR HOST:</h2>
		Time: <br>
		<input type="text" name="time" value="The Time"><br><br>
		Place: <br>
		<input type="text" name="place" value="The Place"><br><br>
		Host Name: <br>
		<input type="text" name="host_name" value="Your Name"><br><br>
		<input type="submit" value="submit"><br><br>
	</form>
	<hr>
	<form action="show_all_data.php" method="get">
		<p>If you wanna check or delete data, click → 
		<input type="submit" value="show data">
		</p>		
	</form>
</div>
	
</div>
</body>
</html>