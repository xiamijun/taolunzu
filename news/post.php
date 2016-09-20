<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 2016/8/30
 * Time: 17:56
 */
require_once 'dbtools.inc.php';

$author=$_POST['author'];
$subject=$_POST['subject'];
$content=$_POST['content'];
$current_time=date('Y-m-d H:i:s');

$sql="insert into message(author,subject,content,date) values('$author','$subject','$content','$current_time')";
$result=mysqli_query($conn,$sql);
print_r($result);

header('location:index.php');
exit();