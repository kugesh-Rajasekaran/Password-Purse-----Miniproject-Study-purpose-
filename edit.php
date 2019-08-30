<?php

session_start();
$editdro=$_POST['editdro'];
$chanuse=$_POST['chanuse'];
$chanpas=$_POST['chanpas'];
$newuse=$_POST['newuse'];
$newpas=$_POST['newpas'];
$usernamm=$_SESSION['userna'];

if(!empty($chanuse) && !empty($chanpas) && !empty($newuse) && !empty($newpas)){
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
   
$select2="DELETE FROM $editdro WHERE $editdro.username='".$chanuse."'";
$ins2 = "INSERT INTO $editdro(user,username,pass) values('$usernamm','$newuse','$newpas')";

$res1=$conn->query($select2);
$res2=$conn->query($ins2);

if($res1){
    echo "<h1 style="">Successfully Deleted<h1>";
}
else{
    echo "Enter Valid Data";
}
if($res2){
    echo "Successfully Inserted";
}
else{
    echo "Can't Able To Insert";
}



}
$conn->close();
}
?>






