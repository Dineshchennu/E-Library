<?php
session_start();
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
   
</head>
<body>
<div class="container">
        <div class="header">
            <h1>E-Library Management System</h1>
            
        </div>
        <div class="wrapper">
            <h3 class="heading">User Login Here</h3>
            <div class="center">
                <?php
                 if(isset($_POST["submit"])){
                 $sql="SELECT * FROM student where NAME='{$_POST['name']}' and PASS='{$_POST['pass']}'";
                   $res=$db->query($sql);  
                   if($res->num_rows>0){
                    $row=$res->fetch_assoc();
                    $_SESSION["ID"]=$row["ID"];
                    $_SESSION["NAME"]=$row["NAME"];
                    header("location:uhome.php");

                   }else{
                    echo "<p class='error'>Invalid User Details</p>";
                   }
                 }
                ?>
                <form action="ulogin.php" method="post">
                    <label>Name</label>
                    <input type="text" name="name" required>
                    <label>Password</label>
                    <input type="password" name="pass" required>
                    <button type="submit" name="submit">Login Now</button>
                </form>
            </div>
        </div>
        <div class="navi">
            <?php
            include "sideBar.php";
            ?>
        </div>
        <div class="footer">
            <p?>Copyright &copy; 2023</p>
        </div>

    </div>
    
</body>
</html>