<html>

<head>
<link href="style.css" type="text/CSS" rel="stylesheet">
</head>
<body>

<form action="index.php" method="post">

    <label>Voornaam:</label>
    <input type="text" name="Voornaam" required="required" placeholder="Vul in je voornaam"/>
    <br></br>
    <label>Achternaam:</label>
    <input type="text" name="Achternaam" required="required" placeholder="Vul in je achternaam"/>
    <br></br>
    <input type="submit" value="submit" name="submit"/>
</form>
    
<?php
if(isset($_POST["submit"])){
    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "logintest";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	$sql = "INSERT INTO login (Voornaam, Achternaam)
	VALUES ('".$_POST["Voornaam"]."','".$_POST["Achternaam"]."')"; 

	if ($conn->query($sql) === TRUE) {
		echo "<script type= 'text/javascript'>alert('Succesvol ingeschreven');</script>";
	} else {
		echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
	}
	$conn->close();
}

?>
<h2>Wie zich al ingeschreven hebben:</h2>
<div class="container">
<?php
$user_name = "root";
$password = "";
$database = "logintest";
$server = "localhost";

$db_handle = mysqli_connect($server, $user_name, $password);
$db_found = mysqli_select_db( $db_handle, $database);

if ($db_found) {
    
    $SQL = 'SELECT * FROM login';
    $result = mysqli_query($db_handle, $SQL);
    echo '<table>
            <tr>
                <th>Voornaam</th>
                <th>Achternaam</th>
            </tr>';
    while ( $db_field = mysqli_fetch_assoc($result) ) {
        echo '
        <tr>
            <td>' . $db_field['Voornaam'] . '</td>
            <td>' . $db_field['Achternaam'] . '</td>
        </tr>';
    }
}
?>
    </div>
</body>

</html>