<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href=""></a>
    <?php
        $serverName = "mysql5030.site4now.net";
        $userName = "a83f2f_hoanex";
        $password = "Hoan8102001";
        $dbName = "db_a83f2f_hoanex";

        $conn = mysqli_connect($serverName, $userName, $password, $dbName);

        if (isset($_POST['signup_submit'])) {
            
            if (!empty($_POST['firstname']) && !empty($_POST['lastname']) 
            && !empty($_POST['username']) && !empty($_POST['email'])
            && !empty($_POST['telephone']) && !empty($_POST['password'])) 
            {
                $Fname = $_POST['firstname'];
                $Lname = $_POST['lastname'];
                $Uname = $_POST['username'];
                $Eemail = $_POST['email'];
                $Telephone = $_POST['telephone'];
                $Pword = $_POST['password'];

                

                $query = "INSERT INTO `user`(`firstname`, `lastname`, `username`, `email`, `telephone`, `password`)
                VALUES  ('$Fname', '$Lname', '$Uname', '$Eemail', '$Telephone', '$Pword' )";

                $run = mysqli_query($conn, $query) ;

                if ($run) {
                    // echo "<script>alert ('dang nhap thanh cong') </script>";

                    header("Location: index.php");
                    

                    exit();
                    // header("Location: login1.php");
                }else{
                    echo " that bai";
                }
            }else{
                echo '<script type = "text/javascript">';
                echo 'alert("Invalid Username or Password!");';
                echo 'window.location.href = "index.php" ';
                echo '</script>';
            }
        }
        ?>
  
</body>
</html>