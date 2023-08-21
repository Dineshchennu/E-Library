<?php
session_start();

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
            <h3 class="heading">View Request Details</h3>
            <?php
            $sql="SELECT student.NAME,request.MES,request.LOGS FROM student INNER JOIN request on student.ID=request.ID";
            $res=$db->query($sql);
            if($res->num_rows>0){
               echo "<table>
               <tr>
               <th>SNO</th>
               <th> STUDENT NAME</th>
               <th>MESSAGE</th>
               <th>LOGS</th>
               </tr>";
               $i=0;
               while($row=$res->fetch_assoc()){
                $i++;
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$row['NAME']}</td>";
                echo "<td>{$row['MES']}</td>";
                echo "<td>{$row['LOGS']}</td>";
                echo "</tr>";
               }
              echo "</table>"; 
            }else{
                echo "<p class='error'>No Request Records Found</p>";
            }
            ?>
            
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