<?php
$address="localhost";
$username="root";
$pass="toor";
$database="testsite";
$conn = new mysqli($address, $username, $pass, $database);
if ($conn->connect_error){
  die("can't connect to database. error: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
    $username = $_GET['username'];
    $password = $_GET['password'];
    $sql = "SELECT username, password, address, phone_number, email FROM users WHERE username = " . "'" . $username . "'" . "AND password = " . "'" . $password . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "username: " . $row["username"] . " -- password: " . $row["password"]. " -- address: " . $row["address"] . " -- phone number: " . $row["phone_number"] . " -- email: " . $row["email"] . "<br>";
        }
      }
    else{ echo "Incorrect Login"; }
    $conn->close();
?>
</body>
</html>