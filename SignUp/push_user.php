<!DOCTYPE html>
<html>
<title>Signed up!</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('images/bg-01.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
</style>
<body>



<?php
error_reporting(E_ERROR | E_PARSE);
$servername = "127.0.0.1";
$username = "root";
$password = "system91";
$dbname = "Users";
$givenroll = "'" . $_POST['Rollnumber'] . "'";
$givenpass = "'" . $_POST['password'] . "'";
$givenname = $_POST['name'] ;
$name = trim($givenname);
$last_name = (strpos($name, ' ') === false) ? '' : preg_replace('#.*\s([\w-]*)$#', '$1', $name);
$first_name = trim( preg_replace('#'.$last_name.'#', '', $name ) );
$firstname = "'" . $first_name . "'";
$lastname = "'" . $last_name . "'";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//echo $lastname;
//$sql = "SELECT firstname, lastname FROM Users WHERE rollno=$givenroll AND password=$givenpass";
$sql = "INSERT INTO Users (rollno, firstname, lastname, password,  email) VALUES ($givenroll, $firstname, $lastname, $givenpass,'kishoresaravanan91@gmail.com');";


$result = $conn->query($sql);

?>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-middle">
  	<?php
  		if($result->num_rows > 0){
  			?>
  			<h1 class="w3-jumbo w3-animate-top">WELCOME</h1>
    		<hr class="w3-border-grey" style="margin:auto;width:40%">
    		<p class="w3-large w3-center">
    			<?php
    				while($row = $result->fetch_assoc()) {
    					echo  $row["firstname"]. " " . $row["lastname"];
    				}
    			?>
    		</p>
    	<?php
  		}
  		else{
  			?>
  			<h1 class="w3-jumbo w3-animate-top">WELCOME</h1>
    		<hr class="w3-border-grey" style="margin:auto;width:40%">
    		<p class="w3-large w3-center">
          <?php
              echo  $first_name. " " . $last_name;
          ?>

        </p>
    		<?php
  		}
  	?>
  </div>
</div>
</body>
</html>

