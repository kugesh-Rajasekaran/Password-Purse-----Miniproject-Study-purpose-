<?php
session_start();
$chgp=$_POST['chgp'];

$chgcp=$_POST['chgcp'];
$usernaa=$_SESSION['userna'] ;

if(!empty($chgp) && !empty($chgcp)){
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
    if($chgp!=$chgcp){
        echo "Password Mismatch";
    }
    else{
        $select2="DELETE FROM reg WHERE user='".$usernaa."'";
    $ins = "INSERT INTO reg(pass,user) values('$chgp','$usernaa')";
    
$res2=$conn->query($select2);    
$res=$conn->query($ins);
//$row = $res->fetch_assoc();
    if($res){
        echo "Successfully Changed";
    }
    else{
        echo "Failed";
    }
    $conn->close();
}

}
}
else{
    echo "enter Valid Data";
}
?>