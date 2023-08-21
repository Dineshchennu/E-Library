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
            <h3 class="heading">Search Books</h3>
            <div class="center">
                
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
               
                <label>Enter book name Or Keywords</label>
                <input type="text" name="name" required></input>
                <button type="submit" name="submit">Search Now</button>
            
            </form>
            </div>
            <?php
             if(isset($_POST['submit'])){
            $sql= "SELECT * FROM book where BTITLE like '%{$_POST["name"]}%' or Keywords like '%{$_POST["name"]}%'";
            $res=$db->query($sql);
            if($res->num_rows>0){
               echo "<table>
               <tr>
               <th>SNO</th>
               <th> BOOK NAME</th>
               <th>KEYWORDS</th>
               <th>VIEW</th>
               <th>Comment</th>
               </tr>";
               $i=0;
               while($row=$res->fetch_assoc()){
                $i++;
                echo "<tr>";
                echo "<td>{$i}</td>";
                echo "<td>{$row['BTITLE']}</td>";
                echo "<td>{$row['KEYWORDS']}</td>";
                echo "<td><a href='{$row['FILE']}' target='_blank'>view</a></td>";
                 echo "<td><a href='comment.php? id={$row['BID']}'>Go</a></td>";
                echo "</tr>";
               }
              echo "</table>"; 
            }else{
                echo "<p class='error'>No Book Records Found</p>";
            }
        }
            ?>
           
            
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