<?php
/**
 * Created by PhpStorm.
 * User: Lee
 * Date: 2016/8/31
 * Time: 18:45
 */
require_once 'dbtools.inc.php';

$author=$_POST['author'];
$subject=$_POST['subject'];
$content=$_POST['content'];
$date=date('Y-m-d H:i:s');
$reply_id=$_POST['reply_id'];

$sql="insert into reply_message(author,subject,content,date,reply_id) values('$author','$subject','$content','$date','$reply_id')";
mysqli_query($conn,$sql);

header("location:show_news.php?id=".$reply_id);
exit();