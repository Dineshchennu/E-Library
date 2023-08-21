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
            <h3 class="heading">View Comments Details</h3>
            <?php
            $sql="SELECT book.BTITLE,student.NAME,comments.COMM,comments.LOGS FROM comments INNER JOIN book on
             book.BID=comments.BID INNER join student on comments.SID=student.ID";
            $res=$db->query($sql);
            if($res->num_rows>0){
               echo "<table>
               <tr>
               <th>SNO</th>
               <th>BOOK NAME</th>
               <th> STUDENT NAME</th>
               <th>COMMENTS</th>
               <th>LOGS</th>
               </tr>";
               $i=0;
               while($row=$res->fetch_assoc()){
                $i++;
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$row['BTITLE']}</td>";
                echo "<td>{$row['NAME']}</td>";
                echo "<td>{$row['COMM']}</td>";
                echo "<td>{$row['LOGS']}</td>";
                echo "</tr>";
               }
              echo "</table>"; 
            }else{
                echo "<p class='error'>No Comments Records Found</p>";
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