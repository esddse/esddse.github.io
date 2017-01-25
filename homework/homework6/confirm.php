<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TJZ BLOG | LEARN TO WALK BEFORE YOU RUN</title>
	<link rel="stylesheet" href="wizardForm_style.css">
	<script language="javascript">
		
		function confirm(){
			window.alert("submit successfully!");
			window.location = "./wizardForm.html";
		}

		// got back and edit again
		function edit(){
			window.history.back();
		}

	</script>
</head>

<body>	
	<section class="main">
		<header>
			<div class="wrap">
				<div class="logo">
					<a href="../../index.html">
						<img src="../../img/logo.png" width="400" height="150" alt="TJZ BLOG | LEARN TO WALK BEFORE YOU RUN">
					</a>
				</div>
				<!-- logo -->
				<div class="social">
					<ul>
						<li>
							<a href="#" class="social-facebook" title="facebook">
								<img src="../../img/facebook.png" alt="facebook" class="social-facebook-img">
							</a>
						</li>
						<li>
							<a href="#" class="social-twitter" title="twitter">twitter</a>
						</li>
						<li>
							<a href="#" class="social-googleplus" title="google plus">google plus</a>
						</li>
					</ul>
				</div>
				<!-- social -->
				<div class="separator"></div>
			</div>
			<!-- wrap -->
		</header>
		
		<section class="content">
			<div class="wrap">

				<?php
					$Personal_FirstName = $_REQUEST['Personal_FirstName'];
					$Personal_LastName = $_REQUEST['Personal_LastName'];
					$Personal_Age = $_REQUEST['Personal_Age'];
					$Personal_Sex = $_REQUEST['Personal_Sex'];
					$Personal_IDNumber = $_REQUEST['Personal_IDNumber'];
					$watch = $_REQUEST['watch'];
					$holiday = $_REQUEST['holiday'];
					$knowledge = $_REQUEST['knowledge'];
					$chat = $_REQUEST['chat'];

					echo "<h2>Please Confirm Informations</h2><hr>";
					echo "<p><b>First Name</b>: ".$Personal_FirstName."</p>";
					echo "<p><b>Last Name</b>: ".$Personal_LastName."</p>";
					echo "<p><b>Age</b>: ".$Personal_Age."</p>";
					echo "<p><b>Sex</b>: ".$Personal_Sex."</p>";
					echo "<p><b>ID Number</b>: ".$Personal_IDNumber."</p>";
					echo "<p><b>Watch</b>: ".$watch."</p>";
					echo "<p><b>Holiday</b>: ".$holiday."</p>";
					echo "<p><b>Knowledge</b>: ".$knowledge."</p>";
					echo "<p><b>Chat</b>: ".$chat."</p><hr>";
					echo "<button style=\"border: none; width: 80px;\" onclick=\"confirm()\">confirm</button>&nbsp;&nbsp;";
					echo "<button style=\"border: none; width: 80px;\" onclick=\"edit()\">edit</button>";
				?>
				<!-- php code -->
			</div>
		</section>
		<!-- content -->

	</section>
	<!-- main -->

	<footer>
		<div class="wrap">
				
		</div>
		<!-- wrap -->
		<div class="footer-image"></div>
		
	</footer>

	
	
</body>
</html>