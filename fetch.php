<?php
session_start();
$usere=$_POST["dro"];
$la=$_SESSION["userna"];


if(!empty($usere)){
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
   
$select="SELECT username FROM $usere WHERE user=? LIMIT 1";
$stmt = $conn->prepare($select);
$stmt->bind_param("s",$la);
$stmt->execute();
$stmt->bind_result($la);
$stmt->store_result();
$rnum = $stmt->num_rows;
//echo "kuuu";
//$res = $stmt->get_result();
//$row = $res->fetch_assoc();
if($rnum!=0){
    $selectt="SELECT username,pass FROM $usere WHERE user='".$la."' LIMIT 1";
    $res=$conn->query($selectt);
$row = $res->fetch_assoc();
   echo "<h1>".$row["username"]." ".$row["pass"]."</h1>";
  // echo "yes";
}
else{
    echo "<h1>You don't have any records</h1>";
}

}
$conn->close();
}
?>






