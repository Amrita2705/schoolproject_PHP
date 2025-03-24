<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif($_SESSION["usertype"]=="student")
{
    header("location:login.php");
}

  $host="localhost";
  $user="root";
  $password="";
  $db="schoolproject";

  $data=mysqli_connect($host,$user,$password,$db);
  $sql="SELECT * From admission";
  $result=mysqli_query($data,$sql);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <?php
    include 'admin_css.php';
    ?>
    </head>    
<body>
     <?php
     include 'admin_sidebar.php';
     ?>
<div class="content">
    <center>
    <h1>Applied For Admmission</h1>
    <br><br>
    <table style="border: 2px solid black; border-collapse: collapse;">
        <tr>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">Name</th>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">Email</th>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">Phone</th>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">Message</th>
        </tr> 
        <?php
         while($info=$result->fetch_assoc())
         {
        ?> 
        <tr>
            <td style="padding: 20px; border: 2px solid black;">
                <?php echo "{$info['name']}"; ?>
            </td> 
            <td style="padding: 20px; border: 2px solid black;">
            <?php echo "{$info['email']}"; ?>
  
            </td> 
            <td style="padding: 20px; border: 2px solid black;">
            <?php echo "{$info['phone']}"; ?>
  
            </td> 
            <td style="padding: 20px; border: 2px solid black;">
            <?php echo "{$info['message']}"; ?>
  
            </td> 
        </tr> 
        <?php
         }
         ?>   
    </table>       
        </center>
</div>      
    
</body>
</html>