<html>
<head>
	<title>Solo For Loop!</title>
</head>
<body>
	<p>
		<?php
		//Vars
		$helloE = "Hello world echoed";
		$hellop = "Hello world printed";
		$user_name = "root";
		$password = "";
		$database = "test_db";
		$server = "127.0.0.1";
		//print is slower than echo apparently
		print $hellop . "<BR>";
		echo $helloE . "<BR>";

		//connect to set server and database
		$link = mysqli_connect($server, $user_name, $password, $database);
		if ($link) { 
			print "Connection to the Server opened <BR>";

			$SQL = "SELECT * FROM emp";
			$result = mysqli_query($link, $SQL);
			//Execute execute and fetch
			while ($row = mysqli_fetch_assoc($result)) {
				print $row['id'] . " " . $row['f_name'] . "<BR>";
			}
		} 
		//if connection failed
		else {
			die('Could not connect to MySQL: ' . mysql_error()); 
		}

		//close connection, good practice
		if ($link){
			mysqli_close($link);
		}
		?>
		<h1>How now brown cow</h1>
	</p>
</body>
</html>