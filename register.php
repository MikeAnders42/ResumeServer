<?php
  $key = $_POST['key'];
  $name = $_POST['name'];
  $numguests = $_POST['numguests'];
  $foodpref = $_POST['foodpref'];
  $allergies = $_POST['allergies'];

  $host_name = 'db5000081171.hosting-data.io';
  $database = 'dbs75889';
  $user_name = 'dbu41062';
  $password = '!Foxfox11';
  $connect = mysqli_connect($host_name, $user_name, $password, $database);

  if (mysqli_connect_errno()) {
    echo '<div>There was a connection error. Try contacting me by <a href="mikeanders42@gmail.com">email</a>.</div>';
  } else {

    $sql = "SELECT * FROM Registry WHERE Name = '" . $name . "' AND ID = '" . $key . "'";
    $exists = $connect->query($sql);
    if ($exists === FALSE or $exists->num_rows === 0){
      echo '<div>This link is invalid or expired. Try contacting me by <a href="mikeanders42@gmail.com">email</a>.</div>';
      exit;
    }

    $sql = 'UPDATE Registry SET NumGoing = ' . $numguests . ", FoodPref = '" . $foodpref . "', Allergies = '" . $allergies . "' WHERE Name = '" . $name . "' AND ID = '" . $key . "'";
    if ($connect->query($sql) === TRUE) {
      echo '<div>Thank you for the RSVP. Wedding details are at the link above.</div>';
    } else {
      echo '<div>This link is invalid or expired. Try contacting me by <a href="mikeanders42@gmail.com">email</a>.</div>';
    }
    $connect->close();
  }
?>