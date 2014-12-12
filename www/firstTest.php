<html>
  <head>
    <title>Solo For Loop!</title>
  </head>
  <body>
    <p>
      <?php

      	$helloE = "Hello world echoed";
      	$hellop = "Hello world printed";
			$user_name = "root";
			$password = "";
			$database = "addressbook";
			$server = "127.0.0.1";

			print $hellop;

			mysqli_connect($server, $user_name, $password);
			


			print "Connection to the Server opened";

		?>
		<h1>How now brown cow</h1>
    </p>
  </body>
</html>