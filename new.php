<?php
if ( isset( $_POST[ "userr" ] ) )
$userr= strip_tags( trim($_POST["userr"]));

if ( isset( $_POST[ "passw" ] ) )
$passw= strip_tags( trim($_POST["passw"]));

if ( isset( $_POST[ "pass1" ] ) )
$pass1= strip_tags( trim($_POST["pass1"]));

if(!empty($userr) && !empty($passw)){
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
    if($passw==$pass1){
    $stmt="Insert into reg(user,pass) values('$userr','$passw')";
    $conn->query($stmt);
    include ('ins_succ.html');
    }
    else{
        include('ins_unsucc.html');
    }


}
$conn->close();
}
?>






?>