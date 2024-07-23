<?php

session_start();
include('connected.php');

$votes=$_POST['gvotes'];
$total_votes=$votes+1;
$gid=$_POST['gid'];
$uid=$_SESSION['userdata']['id'];

$update_votes=mysqli_query($connect,"UPDATE users SET votes='$total_votes' WHERE id='$gid' ");
$update_user_status=mysqli_query($connect,"UPDATE users SET status=1 WHERE id='$uid'");

if($update_votes and $update_user_status){

    $group=mysqli_query($connect,"SELECT * FROM users WHERE role=2");
    $groupdata=mysqli_fetch_all($group,MYSQLI_ASSOC);
    $_SESSION['userdata']['status']=1;
    $_SESSION['groupdata']=$groupdata;

    echo'
    <script>
    alert("Sucessfully voted");
    window.location="dashboard.php";
    </script>';
}
else{
    echo'
    <script>
    alert("Invalid Credentials");
    window.location="dashboard.php";
    </script>';
}

?>








<?php
// session_start();
// include('connected.php');

// $votes = $_POST['gvotes'];
// $total_votes = $votes + 1; // Incrementing votes by 1
// $gid = $_POST['gid'];
// $uid = $_SESSION['userdata']['id'];

// // Update the total votes for the group
// $update_votes = mysqli_query($connect, "UPDATE user SET votes='$total_votes' WHERE id='$gid' ");

// // Update the status of the user who voted
// $update_user_status = mysqli_query($connect, "UPDATE user SET status=1 WHERE id='$uid'");

// if ($update_votes and $update_user_status) {
//     // If updates were successful, fetch updated group data and update session variables
//     $groups = mysqli_query($connect, "SELECT id, name, vote FROM user WHERE role=2");
//     $groupdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);
//     $_SESSION['userdata']['status'] = 1;
//     $_SESSION['groupdata'] = $groupdata;

//     echo '
//     <script>
//     alert("Successfully voted");
//     window.location="dashboard.php";
//     </script>';
// } else {
//     echo '
//     <script>
//     alert("Invalid Credentials");
//     window.location="dashboard.php";
//     </script>';
// }
?>
