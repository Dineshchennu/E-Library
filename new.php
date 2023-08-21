<?php
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
            <h3 class="heading">New User Registration</h3>
            <div class="center">
                <?php
                if(isset($_POST['submit'])){
                   
                    $sql="insert into student(NAME,PASS,MAIL,DEP) values
                     ('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["email"]}','{$_POST["dep"]}')";
                    $db->query($sql);
                    echo "<p class='success'>User Registration success</p>";
                }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <label>Name</label>
                <input type="text" name="name" required></input>
                <label>Password</label>
                <input type="password" name="pass" required></input>
                <label>Email ID</label>
                <input type="email" name="email" required></input>
                <select name="dep" required>
                    <option value="">Select</option>
                    <option value="B.sc">B.sc</option>
                    <option value="B.A">B.A</option>
                    <option value="B.com">B.com</option>
                    <option value="BCA">BCA</option>
                </select>
                <button type="submit" name="submit">Register Now</button>
            
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