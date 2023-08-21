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
            <h3 class="heading">New Book Request</h3>
            <div class="center">
                <?php
                if(isset($_POST['submit'])){
                    $sql="insert into request (ID,MES,LOGS) values (
                        {$_SESSION["ID"]},'{$_POST['mess']}',now()
                    )";
                    $db->query($sql);
                        echo "<p class='success'>Request submitted successfully</p>";
                    }
                
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
               
                <label>Message</label>
                <input type="textarea" name="mess" required></input>
                <button type="submit" name="submit">Submit</button>
            
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