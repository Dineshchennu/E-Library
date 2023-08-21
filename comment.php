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
            <h3 class="heading">Send Your Comment.</h3>
            <?php
            $sql="select * from BOOK where BID=" . $_GET['id']; 
            $res=$db->query($sql);
            if($res->num_rows>0){
                echo "<table>";
                $row=$res->fetch_assoc();
                echo "
                <tr>
                <th>Book Name</th>
                <td>{$row['BTITLE']}</td>
                </tr>
                <tr>
                <th>keywords</th>
                <td>{$row['KEYWORDS']}</td>
                </tr>
                ";
                echo "</table>";

            }else{
                echo "<p class='error'>No Books Found</p>";
            }
            ?>
            <div class="center">
             <form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
                <label>Your Comments</label>
                <input type="textarea" name="mes" required></input>
                <button type="submit" name="submit">Post Now</button>
             </form>
            </div>
            <?php
            if(isset($_POST['submit'])){
                   
                $sql="INSERT INTO comments(BID,SID,COMM,LOGS) 
                VALUES ({$_GET['id']},{$_SESSION["ID"]},'{$_POST['mes']}',now())";
                $db->query($sql);
                echo "<p class='success'>Comment Posted</p>";
            }
              $sql="SELECT student.NAME,comments.COMM,comments.LOGS FROM comments INNER JOIN student
               on comments.SID=student.ID WHERE comments.BID={$_GET['id']} ORDER BY comments.CID DESC";
               $res=$db->query($sql);
               if($res->num_rows>0){
                while($row=$res->fetch_assoc())
                {
                    echo "<p>
                    <strong>{$row["NAME"]}</strong>
                    {$row["COMM"]}
                    <i>{$row["LOGS"]}</i>
                    </p>";
                }
               }else{
                echo "<p class='error'>No Comments Yet</p>";
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