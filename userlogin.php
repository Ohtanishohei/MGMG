<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 

$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$email = $_POST['email'];
if($username == "" || $password == "" || $confirm == "" || $email == "")
{
 echo "<script>alert('信息不能为空！重新填写');window.location.href='用户注册登录.html'</script>";
} elseif ((strlen($username) < 3)||(!preg_match('/^\w+$/i', $username))) {
 echo "<script>alert('用户名至少3位且不含非法字符！重新填写');window.location.href='用户注册登录.html'</script>";
 
}elseif(strlen($password) < 5){
 echo "<script>alert('密码至少5位！重新填写');window.location.href='用户注册登录.html'</script>";
 
}elseif($password != $confirm) {
 echo "<script>alert('两次密码不相同！重新填写');window.location.href='用户注册登录.html'</script>";
 
} elseif (!preg_match('/^[\w\.]+@\w+\.\w+$/i', $email)) {
 echo "<script>alert('邮箱不合法！重新填写');window.location.href='用户注册登录.html'</script>";
 
}  elseif(mysqli_fetch_array(mysqli_query($link,"select * from login where username = '$username'"))){
 echo "<script>alert('用户名已存在');window.location.href='用户注册登录.html'</script>";
} else{
 $sql= "insert into login(username, password, confirm, email)values('$username','$password','$confirm','$email')";

 if ($conn->query($sql) === TRUE) {
   echo "<script>alert('数据插入失败');window.location.href='用户注册登录.html'</script>";
 }else{
   echo "<script>alert('注册成功！)</script>";
 }
}
?>