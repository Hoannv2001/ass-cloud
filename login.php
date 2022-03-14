<?php
    session_start();
    $serverName = "mysql5030.site4now.net";
    $userName = "a83f2f_hoanex";
    $password = "Hoan8102001";
    $dbName = "db_a83f2f_hoanex";
    $conn = mysqli_connect($serverName, $userName, $password, $dbName);
    mysqli_select_db($conn, $dbName);
    
   $firstname= $_POST['firstname'];
   $lastname=$_POST['lastname'];
   $username=$_POST['username'];
   $password=$_POST['password'];
   $email=$_POST['email'];
   $telephone=$_POST['telephone'];

    $sql="SELECT * FROM user WHERE  username ='$username' and  password = '$password' ";
   
   $result = mysqli_query($conn, $sql);
   $num = mysqli_num_rows($result);
   
   if ($num >0) {
       $_SESSION['SER']=$username;

       while($row = mysqli_fetch_assoc($result)){
        $_SESSION['Fname'] = $row['firstname'];
        $_SESSION['Lname'] = $row['lastname'];
        $_SESSION['USER'] = $row["username"];
        $_SESSION['Email'] = $row['email'];
        $_SESSION['Telephone'] = $row['telephone'];
        $_SESSION['Pass'] = $row['password'];
        $_SESSION['ID'] = $row['ID'];

     
        header("Location: myWeb.php");
       }
       
   
   }else{
       echo '<script type = "text/javascript">';
       echo 'alert("Invalid Username or Password!");';
       echo '</script>';
   }
   ?>