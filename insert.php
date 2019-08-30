<?php
session_start();

$sel=$_POST["sel"];

if(isset($_POST["ipu"]))
$ipu=strip_tags(trim($_POST["ipu"]));
if(isset($_POST["pwo"]))
$pwo=strip_tags(trim($_POST["pwo"]));
$userna=$_SESSION['userna'] ;

if(!empty($ipu) && !empty($pwo)){
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
    $ins = "INSERT INTO $sel(user,username,pass) values('$userna','$ipu','$pwo')";
    
    
    //$tot=mysqli_fetch_assoc($stmt);
$res=$conn->query($ins);
//$row = $res->fetch_assoc();
    if($res){
        echo "Successfully Inserted";
    }
    else{
        echo "Enter valid data";
    }
    $conn->close();
}


}
else{
    echo "enter Username or Password";
}
?>