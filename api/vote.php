<?php
session_start();
include("connect.php");

$votes = $_POST['gvotes'];
$tot_votes = $votes+1;
$gid = $_POST['gid'];
$userid = $_SESSION['userdata']['id'];

$update_db = mysqli_query($connect,"UPDATE user SET votes='$tot_votes' WHERE id='$gid'");
$update_user = mysqli_query($connect,"UPDATE user SET status=1 WHERE id='$userid'");

if($update_db and $update_user){
    $groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2");
    $groupdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    $_SESSION['userdata']['status'] = 1;
    $_SESSION['groupdata'] = $groupdata;
    echo'
    <script>
    alert("Voting Successful!");
        window.location = "../routes/dashboard.php";
    </script>
    ';
}
else{
    echo'
    <script>
    alert("Some error occured!");
        window.location = "../routes/dashboard.php";
    </script>
    ';
}
?>