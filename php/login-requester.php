<?php
  //Start the Session
  session_start();
  require('connect.php'); //connection to DB

  $usernameErr = "";
  //Function to make login secure
  function make_safe($variable, $connection) {
    $variable = mysqli_real_escape_string($connection, trim($variable));
    return $variable;
  }

  //3. If the form is submitted or not.
  //3.1 If the form is submitted
  if (isset($_POST['login'])) {
    //update action
    if (isset($_POST['username']) and isset($_POST['password'])) {
      //3.1.1 Assigning posted values to variables.
      $username = make_safe($_POST['username'], $connection);
      $password = make_safe($_POST['password'], $connection);
      $encryptPassword = md5($password);
  
      //3.1.2 Checking the values are existing in the database or not
      //Some things to work on username: heiho';#
      $query = "SELECT * FROM `login_requester` WHERE username='$username' and password='$encryptPassword'";
      $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
      $count = mysqli_num_rows($result);
  
      //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
      if ($count == 1) {
        $_SESSION['username'] = $username;
        if ($result) {
          while($row = $result->fetch_assoc()) {
            $wallet = $row['WALLET'];
          }
          $_SESSION['wallet'] = $wallet;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      } else {
      //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        $fmsg = "Invalid Login Credentials.";
        $usernameErr = "username or passowrd is either incorrect or have not been registered yet";
        $_SESSION['username'] = NULL;
        $_SESSION['message'] = $usernameErr;
      }
    } else {
      $usernameErr = "username or passowrd is required";
      $_SESSION['message'] = $usernameErr;
    }
  
    //3.1.4 if the user is logged in Greets the user with message
    if (isset($_SESSION['username'])) {
      header("Location: querytask.php");
    } else {
      header("Location: ../html/homepage.php");
    }
    //3.2 When the user visits the page first time, simple login form will be displayed.
  } else if (isset($_POST['register'])) {
      //delete action
      if (isset($_POST['username']) && isset($_POST['password'])){
        $username = make_safe($_POST['username'], $connection);
        $password = make_safe($_POST['password'], $connection);
        $encryptPassword = md5($password);

        echo $query = "INSERT INTO `login_requester` (username, password, wallet) VALUES ('$username', '$encryptPassword', 0)";
        $result = mysqli_query($connection, $query);
          
        if($result){
            $msg = "User Created Successfully.";
        }else{
            $msg ="User Registration Failed";
        }
        $_SESSION['message'] = $msg;
        header("Location: ../html/homepage.php");
      }
  }
?>