<?php
session_start();

include "db.php";
if(!isset($_SESSION["ID"])){
    header("location:ulogin.php");
}
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
            <h3 class="heading">Change Password</h3>
            <div class="center">
                <?php
                if(isset($_POST['submit'])){
                    $sql="select * from student WHERE PASS='{$_POST['opass']}' and ID='{$_SESSION["ID"]}'";
                    $res=$db->query($sql);
                    if($res->num_rows>0){
                        $s="update student set PASS='{$_POST["npass"]}' WHERE ID=".$_SESSION["ID"];
                        $db->query($s);
                        echo "<p class='success'>Password Changed</p>";
                    }
                }else{
                    echo "<p class='error'>Invalid Password</p>";
                }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <label>Old Password</label>
                <input type="password" name="opass" required></input>
                <label>New Password</label>
                <input type="password" name="npass" required></input>
                <button type="submit" name="submit">Update password</button>
            
            </form>
            </div>
           
            
        </div>
        <div class="navi">
            <?php
            include "userSidebar.php";
            ?>
        </div>
        <div class="footer">
            <p?>Copyright &copy; 2023</p>
        </div>

    </div>
    
</body>
</html>