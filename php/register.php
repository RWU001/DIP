<?php
  session_start();
  require('connect.php');
  
  // If the values are posted, insert them into the database.
  if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $email = "Alfred1datui@gmail.com";
    $password = $_POST['password'];
      
    echo $query = "INSERT INTO `login` (username, password, email) VALUES ('$username', '$password', '$email')";
    $result = mysqli_query($connection, $query);
      
    if($result){
        $msg = "User Created Successfully.";
    }else{
        $msg ="User Registration Failed";
    }
    $_SESSION['messsage'] = $msg;
    header("Location: ../html/homepage.html");
  }
?>