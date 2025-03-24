<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
}

elseif($_SESSION["usertype"]=="admin")
{
    header("location:login.php");
}

    $host="localhost";
    $user="root";
    $password="";
    $db="schoolproject";

    $data=mysqli_connect($host,$user,$password,$db);

    $name=$_SESSION['username'];
    $sql="SELECT * FROM user WHERE username='$name'";
    $result=mysqli_query($data,$sql);
    $info=mysqli_fetch_assoc($result);
    if(isset($_POST['update_profile']))
    {
        //$name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];

        $sql2="UPDATE user SET  email='$email',
        phone='$phone', password='$password' WHERE username='$name'";

        $result2=mysqli_query($data,$sql2);

        if($result2)
        {
            //echo "Update Success";
            header("location:login.php");
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard </title>

    <style>
        label{
            dispaly:inline-block;
            width: 100px;
            text-align:right;
            padding-top:10px;
            padding-bottom:10px;

        }
    .div_deg{
        background-color: skyblue;
        width:400px;
        padding-top:70px;
        padding-bottom:70px;
    }    
     </style>
    <?php
    include 'student_css.php';
  ?>  

    </head>    
<body>
    
<?php
include 'student_sidebar.php';
  ?>  

  <div class="content">
    <center>
        <h1> Update Profile</h1>
        <br><br>
    <form class="div_deg" action ="#" method="POST">
           
        <div>
            <label>Email</label>
            <input type="text" name="email" 
            value="<?php echo "{$info['email']}";?>">
        </div>   

        <div>
            <label>Phone</label>
            <input type="text" name="phone"
            value="<?php echo "{$info['phone']}";?>">
        </div>   

        <div>
            <label>Password</label>
            <input type="text" name="password"
            value="<?php echo "{$info['password']}";?>">
        </div>   

        <div>
            
            <input type="submit" name="update_profile" 
            class="btn btn-primary" value="Update">
        </div>   

</form>
    </center>   
    </div> 
</body>
</html>