<html>
<body>

<?php
  $name = $POST_['name'];
  $numguests = $POST_['numguests'];
  $foodpref = $POST_['foodpref'];
  $allergies = $POST_['allergies'];

  $host_name = 'db5000081171.hosting-data.io';
  $database = 'dbs75889';
  $user_name = 'dbu41062';
  $password = '!Foxfox11';
  $connect = mysql_connect($host_name, $user_name, $password, $database);

  if (mysql_errno()) {
    echo '<p>There was a connection error. Try contacting me by <a href="mikeanders42@gmail.com">email</a>.</p >';
  } else {

    $sql = "UPDATE Registry SET NumGoing = " . $numguests . ", FoodPref = '" . $foodpref . "', Allergies = '" . $allergies . "' WHERE Name = '" . $name . "'";
    if ($conn->query($sql) === TRUE) {
      
    } else {

    }
    $conn->close();
  }
?>

</body>
</html>