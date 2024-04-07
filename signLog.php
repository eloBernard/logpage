form_ code
<?php

$username = filter_input(INPUT_POST, 'username');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');

if (!empty($username)) {
    if (!empty($email)) { 
        if (!empty($password)) { 
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbemail = "root";
        $dbname = "login";

        // Create connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname, $dbemail);

        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
        } else {
            $sql = "INSERT INTO form (username, password) VALUES ('$username','$email', '$password')";

            if ($conn->query($sql)) {
                echo "New record successfully inserted";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
        }
    } else {
        echo "Password should not be empty";
    }
} else {
    echo "Username should not be empty";
}   echo "email should not be empty";
}

         
// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($email)) {
        array_push($errors, "E-mail is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now REGISTERED!!!";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
?>