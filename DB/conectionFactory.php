<?php  

function getConnection(){

	$servername = "127.0.0.1:3306";
	$username = "root";
	$password = "root";
	$dbname = "TESTE_DEFENSORIA";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
	catch(PDOException $e)
	{
		echo "Connection failed: " . $e->getMessage();
	}
}


?>