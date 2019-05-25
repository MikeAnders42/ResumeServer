<?php
  $key = $POST_['key'];
  $name = $POST_['name'];
  $numguests = $POST_['numguests'];
  $foodpref = $POST_['foodpref'];
  $allergies = $POST_['allergies'];

  echo '<div>' . $key . $name . $numguests . $foodpref . $allergies . '</div>';

  $host_name = 'db5000081171.hosting-data.io';
  $database = 'dbs75889';
  $user_name = 'dbu41062';
  $password = '!Foxfox11';
  $connect = mysqli_connect($host_name, $user_name, $password, $database);

  if (mysqli_connect_errno()) {
    echo '<div>There was a connection error. Try contacting me by <a href="mikeanders42@gmail.com">email</a>.</div>';
  } else {

    $sql = "UPDATE Registry SET NumGoing = " . $numguests . ", FoodPref = '" . $foodpref . "', Allergies = '" . $allergies . "' WHERE Name = '" . $name . "', ID='" + $key + "'";
    if ($connect->query($sql) === TRUE) {
      echo '<div>Thank you for the RSVP. Wedding details are at the link above.</div>';
    } else {
      echo '<div>This link is invalid or expired. Try contacting me by <a href="mikeanders42@gmail.com">email</a>.</div>';
    }
    $connect->close();
  }
?>