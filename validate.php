<?php
session_start();
if(isset($_POST['userna']))
$userna=strip_tags(trim($_POST['userna']));

if ( isset( $_POST[ 'passwo' ] ) )
$passwo=strip_tags( trim($_POST['passwo']));



$_SESSION['userna'] = $userna;
$_SESSION['passna'] = $passwo;

if(!empty($userna) && !empty($passwo)){
    $host="localhost";
    $dbname="id7285592_kugesh";
    $use="id7285592_root";
    $pas="11111";
    
    $conn=new mysqli($host,$use,$pas,$dbname);
    if(mysqli_connect_error())
    {
        die('connect error ('.mysqli_connect_error().')');
    }
else{
    $SELECT = "SELECT user From reg Where user = ? Limit 1";
$sub="SELECT pass From reg Where user = '".$userna."'";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $userna);
    $stmt->execute();
    $stmt->bind_result($userna);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    //$tot=mysqli_fetch_assoc($stmt);
$res=$conn->query($sub);
$row = $res->fetch_assoc();
    if($rnum==0){
        echo "Register first";
    }
    else if($row["pass"]==$passwo){
     
include 'fetch_Or_Insert.html';
    }
    else if($row["pass"]!=$passwo){
        echo "Password Is Incorrect";
    }
    }
    $conn->close();
}



else{
    echo "Enter Valid Data";
}
?>