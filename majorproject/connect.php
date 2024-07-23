
<?php 
$connect = mysqli_connect("localhost", "root", "", "voting") or die("connection failed");


$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword= $_POST['cpassword'];
$department= $_POST['department'];
$image = $_FILES['photo']['name'];
$tmp_name= $_FILES['photo']['tmp_name'];
$role= $_POST['role'];


// $insert=mysqli_query($connect,"INSERT INTO users(name,mobile,password,department,photo,role,status,votes)VALUES ('$name','$mobile','$password','$department','$image','$role',0,0)");
// if($insert==true && $password==$cpassword)
if ($password==$cpassword) 
{
    move_uploaded_file($tmp_name,"./uploads/$image");
    $insert=mysqli_query($connect,"INSERT INTO users(name,mobile,password,department,photo,role,status,votes)VALUES ('$name','$mobile','$password','$department','$image','$role',0,0)");

    if ($insert)
    {
    echo'
    <script>
    alert("sucess ");
    window.location="index.html";
    </script>';
}
else{
    echo'
    <script>
    alert("password not matched ");
    window.location="register.html";
    </script>';}}
    else{
        echo'
    <script>
    alert("password naa matched ");
    window.location="register.html";
    </script>';
    }
    
?>