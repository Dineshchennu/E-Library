<?php
session_start();
function countRecord($sql,$db){
    $res=$db->query($sql);
    return $res->num_rows;
}
include "db.php";
if(!isset($_SESSION["AID"])){
    header("location:alogin.php");
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
            <h3 class="heading">Admin Home</h3>
            <div class="center">
                <ul class="record">
                    <li>Total Students :<?php echo countRecord("select * from student",$db);?></li>
                    <li>Total Books :<?php echo countRecord("select * from book",$db);?></li>
                    <li>Total Request :<?php echo countRecord("select * from request",$db);?></li>
                    <li>Total comments :<?php echo countRecord("select * from comments",$db);?></li>
                </ul>

            </div>
        </div>
        <div class="navi">
            <?php
            include "adminSidebar.php";
            ?>
        </div>
        <div class="footer">
            <p?>Copyright &copy; 2023</p>
        </div>

    </div>
    
</body>
</html>