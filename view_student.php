<?php
error_reporting(0);
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
    $sql="SELECT *FROM user WHERE usertype='student'";
    $result=mysqli_query($data,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard </title>
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
    <h1>Student Data</h1> 
    
    <?php
    if($_SESSION['message'])
    {
        echo $_SESSION['message'];
    }
    unset($_SESSION['message']);
    ?>
    <br><br>
    <table style="border: 2px solid black; border-collapse: collapse;">
        <tr>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">Username</th>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">Email</th>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">Phone</th>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">Password</th>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">Delete</th>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">Update</th>
     
        </tr> 
        <?php
        while($info=$result->fetch_assoc())
        {

    
        ?>
        <tr>
            <td style="padding: 20px; font-size: 15px; border: 2px solid black;">
                <?php
                echo "{$info['username']}" ;
                ?>
            </td>
            <td style="padding: 20px; font-size: 15px; border: 2px solid black;">
            <?php
                echo "{$info['email']}" ;
                ?>
            </td>
            <td style="padding: 20px; font-size: 15px; border: 2px solid black;">
            <?php
                echo "{$info['phone']}" ;
                ?>
            </td>
            <td style="padding: 20px; font-size: 15px; border: 2px solid black;">
            <?php
                echo "{$info['password']}" ;
                ?>
            </td>
            <td style="padding: 20px; font-size: 15px; border: 2px solid black;">
            <?php
                echo "<a  class='btn btn-danger' onclick=\" javascript:return confirm('Are you sure to Delete This') \" href='delete.php?student_id={$info['id']}'>Delete </a>";
                ?>
            </td>
            <td style="padding: 20px; font-size: 15px; border: 2px solid black;">
            <?php
         echo "<a  class='btn btn-primary'href='update_student.php?student_id={$info['id']}'> Update </a>" ;
                ?>
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