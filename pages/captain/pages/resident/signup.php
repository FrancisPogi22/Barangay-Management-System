<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: pages/permit/permit.php");
    }
?>
<?php
        include "../connection.php";
        if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $username = mysqli_real_escape_string($con, $_POST['user']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['pass']);
        
        $sql="select * from tblsignup where username='$username'";
        $result = mysqli_query($con, $sql);
        $count_user = mysqli_num_rows($result);

        $sql="select * from tblsignup where email='$email'";
        $result = mysqli_query($con, $sql);
        $count_email = mysqli_num_rows($result);

        if($count_user == 0 & $count_email==0){
            if($password==$name){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO signup(name, username, email, password, type) VALUES('$username', '$email', '$hash')";
                $result = mysqli_query($con, $sql);
                if($result){
                    header("Location: login.php");
                }
            }
        }
        else{
            if($count_user>0){
                echo '<script>
                    window.location.href="index.php";
                    alert("Username already exists!!");
                </script>';
            }
        }
        
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
  <body>
    <div id="sform">
        <h4 id="heading"><b>Sign Up</b></h4><br>
        <form name="form" action="signup.php" method="POST">
            <label>Enter Name: </label>
            <input type="text" id="user" name="name" required><br><br>
            <label>Enter Username: </label>
            <input type="text" id="user" name="user" required><br><br>
            <label>Enter Email: </label>
            <input type="email" id="email" name="email" required><br><br>
            <label>Create Password: </label>
            <input type="password" id="pass" name="pass" required><br><br>
            <label>Type: </label>
            <input type="text" id="user" name="user" required><br><br>
            <input type="submit" id="btn" value="Sign Up" name = "submit"/>
            <a class="btn" id="btn" type="submit" href="pages/resident/login.php">Login</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>