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
            <h3 class="heading">Upload Books</h3>
            <div class="center">
                <?php
                if(isset($_POST['submit'])){
                   $target_dir="upload/";
                   $target_file=$target_dir.basename($_FILES["efile"]['name']);
                   if(move_uploaded_file($_FILES["efile"]['tmp_name'], $target_file)){
                    $sql="insert into book (BTITLE,KEYWORDS,FILE) values
                     ('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
                    $db->query($sql);
                    echo "<p class='success'>Books Uploaded</p>";

                   }else{
                    echo "<p class='error'>Error in Upload</p>";
                   }
                }
                ?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                <label>Book Title</label>
                <input type="text" name="bname" required></input>
                <label>Keywords</label>
                <input type="textarea" name="keys" required></input>
                <label>Upload File</label>
                <input type="file" name="efile" id="file" required>
                
                <button type="submit" name="submit">Upload book</button>
            
            </form>
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