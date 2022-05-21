
<!DOCTYPE html>
<html lang="en">

<?php
  #1
   //open & close connection
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'usersdb';
   $link = mysqli_connect( $dbhost, $dbuser, $dbpass,$dbname);

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging error #: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The <span style='color:red'> $dbname </span>database is great.<br>" . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;


/*$sql = "CREATE DATABASE usersDB";
if (mysqli_query($link, $sql)) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . mysqli_error($link);
}*/

/*$sql = "CREATE TABLE USERS( 
user_id INT NOT NULL AUTO_INCREMENT,
user_name VARCHAR(20) NOT NULL,
user_email  VARCHAR(20) NOT NULL,
user_gender enum ('male', 'femal'),
user_mail_status enum('yes', 'no'),
primary key ( user_id ))";

$retvalu = mysqli_query( $link,$sql );
   
if(! $retvalu ) {
   die('Could not create table: ' . mysqli_error($conn));
}
echo "<br>Database Table  created successfully\n";*/

$sql = "INSERT INTO users(user_name,user_email, user_gender, user_mail_status) 
VALUES ( 'adel','adel@gmail.com', 'male','yes')";

$sql = "INSERT INTO users(user_name,user_email, user_gender, user_mail_status) 
VALUES ( 'u2','u2@ex', 'male','yes')";
$sql = "INSERT INTO users(user_name,user_email, user_gender, user_mail_status) 
VALUES ( 'u3','u2@ex', 'male','no')";
$sql = "INSERT INTO users(user_name,user_email, user_gender, user_mail_status) 
VALUES ( 'u4','u1@ex', 'male','yes')";

$retvalu = mysqli_query( $link,$sql );
   
if(! $retvalu) {
   die('Could not insert to table: ' . mysqli_error($link));
}
 
echo "<br>Data inserted to table successfully\n";

?>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
<table>
<tr>
<th>#</th>
<th>Email</th>
<th>Gender</th>
<th>mailstatus</th>
<th>actions</th>
</tr>

<?php
   
 $sql = 'SELECT user_id ,user_name,user_email, user_gender, user_mail_status FROM users';
 mysqli_select_db($link,$dbname);
 $result = mysqli_query($link,$sql);
if(! $result ) {
   die('Could not get data: ' . mysqli_error($link));
}


if (mysqli_num_rows($result) > 0) 

{
   while($row = mysqli_fetch_assoc($result)) 
   {
    
      echo " <tr><td>"  .$row['user_id']. "</td><td> "
      .$row['user_email']. "</td><td>".
      $row['user_gender'] ."</td><td>".
           $row['user_mail_status']."</td></tr>";
   } 
   
   echo "</table>";
}

   

  else {
   echo "0 results";
 
}


?>


</table>


</body>
</html>



