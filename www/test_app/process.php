<?PHP

$errorMessage = "";
//==========================================
//	Logging function to file log.txt
//==========================================
function logThis($msg) {
	$myLog = fopen("log.txt", "a");
	fwrite($myLog, date("h:i:sa") . " " . $msg . "\r\n");
	fclose($myLog);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	logThis("Post acquired");
	$ufName = $_POST['ufNameEntry'];
	$ulName = $_POST['ulNameEntry'];

	logThis("Input is: " . $ufName);

	//All entries in db are in lowercase
	$ufName = strtolower($ufName);
	$ulName = strtolower($ulName);

	//==========================================
	//	Connect to local db
	//==========================================
	$user_name = "root";
	$password = "";
	$database = "test_db";
	$server = "127.0.0.1";

	$link = mysqli_connect($server, $user_name, $password, $database);
	//successful link
	if ($link) {
		logThis("Link with db established");

		$SQL = "SELECT * FROM emp WHERE f_name = '$ufName' OR l_name = '$ulName'";
		$SQL2 = "SELECT * FROM emp";

		$result = mysqli_query($link, $SQL);
		logThis("Query run");
		//successful query
		if ($result){
			$num_rows = mysqli_num_rows($result);
			if ($num_rows > 0){
				logThis("Rows fetched from query = " . $num_rows);
				echo "Rows returned:" . "<BR>";

				while ($row = mysqli_fetch_assoc($result)) {
					print $row['f_name'] . " " . $row['l_name'] . "'s id is: " . $row['id'] . "<br>";
				}
			}
			else{
				echo "No results" . "<br>";
				logThis("Rows fetched from query = 0");
			}
		}
		else{
			echo "Problem with query/results" . "<br>";
			logThis("Problem with query/results");
			// echo $result;
		}
		mysqli_close($link);
	}

	else {
		$errorMessage = "Error logging on";
	}
	logThis("--------------------------DONE--------------------------");
}

?>

<html>
	<head>
		<title>Processing page</title>
	</head>
	<body>
		<FORM NAME ="form1" METHOD ="POST" ACTION ="index.php">
			<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Goback">
		</FORM>
	</body>
</html>