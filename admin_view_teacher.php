<?php
session_start();
error_reporting(0);
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
    $sql="SELECT * From teacher";
    $result=mysqli_query($data,$sql);

    if($_GET['teacher_id'])
    {
        $t_id=$_GET['teacher_id'];
        $sql2="DELETE FROM teacher WHERE id='$t_id'";
        $result2=mysqli_query($data,$sql2);
        if($result2)
        {
            //echo "delete Success";
            header('location:admin_view_teacher.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Dashboard </title>
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
    <h1>View All Teacher Data</h1> 
    <table style="border: 2px solid black; border-collapse: collapse;">
        <tr>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">Teacher Name</th>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">About Teacher</th>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">Image</th>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">Delete</th>
            <th style="padding: 20px; font-size: 15px; border: 2px solid black;">Update</th>

   

        </tr> 
        <?php
        while($info=$result->fetch_assoc())
        {

        
        ?>
        <tr>
            <td style="padding: 20px; font-size: 15px; border: 2px solid black;">
                <?php  echo "{$info['name']}";?>
            </td> 
            <td style="padding: 20px; font-size: 15px; border: 2px solid black;">
            <?php  echo "{$info['description']}";?>
            </td>
            <td style="padding: 20px; font-size: 15px; border: 2px solid black;">
           <img height="100px" width="100px" src=" <?php  echo "{$info['image']}";?>">
            </td>
            <td style="padding: 20px; font-size: 15px; border: 2px solid black;">

            <?php
            echo "
                <a  onClick=\"javascript:return confirm('Are You Sure to Delete This');\" class='btn btn-danger'
                 href='admin_view_teacher.php?teacher_id={$info['id']}'>
                Delete</a>";
                ?>
            </td> 
            <td style="padding: 20px; font-size: 15px; border: 2px solid black;">
            <?php
            echo "
                <a
                class='btn btn-primary'
                 href='admin_update_teacher.php?teacher_id={$info['id']}'>
                Update</a>";
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