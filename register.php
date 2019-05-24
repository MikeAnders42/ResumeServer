<?php
  $key = $POST_['key'];
  $name = $POST_['name'];
  $numguests = $POST_['numguests'];
  $foodpref = $POST_['foodpref'];
  $allergies = $POST_['allergies'];

  $host_name = 'db5000081171.hosting-data.io';
  $database = 'dbs75889';
  $user_name = 'dbu41062';
  $password = '!Foxfox11';
  $connect = mysqli_connect($host_name, $user_name, $password, $database);

  if (mysqli_connect_errno()) {
    echo 'There was a connection error. Try contacting me by <a href="mikeanders42@gmail.com">email</a>.';
  } else {

    $sql = "UPDATE Registry SET NumGoing = " . $numguests . ", FoodPref = '" . $foodpref . "', Allergies = '" . $allergies . "' WHERE Name = '" . $name . "', ID='" + $key + "'";
    if ($connect->query($sql) === TRUE) {
      echo 'Thank you for the RSVP. Wedding details are at the link above.';
    } else {
      echo 'This link is invalid or expired. Try contacting me by <a href="mikeanders42@gmail.com">email</a>.';
    }
    $connect->close();
  }
?>