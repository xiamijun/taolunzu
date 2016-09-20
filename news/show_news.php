<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>讨论区</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        function check_data(){
            if (document.myForm.author.value.length==0){
                alert('作者不能为空');
            }
            else if (document.myForm.subject.value.length==0){
                alert('主题不能为空');
            }
            else if (document.myForm.content.value.length==0){
                alert('内容不能为空');
            }
            else{
                myForm.submit();
            }
        }
    </script>
    <style>
        .kongkong{
            height:20px;
        }
        .form-group{
            width: 500px;
        }
    </style>
</head>
<body>
<div class="container">
<h1 align="center">来点意见吧</h1>
<?php
require_once 'dbtools.inc.php';

$id=$_GET['id'];

$sql="select * from message where id=$id";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($result)){
    ?>

    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 align="center"><strong>讨论主题</strong></h3><br>
        </div>
        <div class="panel-body">
            <label class="label label-primary">主题：<?php echo $row['subject']; ?></label>
            <label class="label label-primary">作者：<?php echo $row['author']; ?></label>
            <label class="label label-default pull-right">时间：<?php echo $row['date']; ?></label><br><br>
            <?php echo $row['content']; ?>
        </div>
    </div>

    <?php
}
?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h2 align="center">
                <strong>回复主题</strong>
            </h2>
        </div>
        <div class="panel-body">
            <?php
            $sql2="select * from reply_message where reply_id=$id";
            $result2=mysqli_query($conn,$sql2);
            while($row2=mysqli_fetch_array($result2)){
                ?>

                <label class="label label-primary">主题：<?php echo $row2['subject']; ?></label>
                <label class="label label-primary">作者：<?php echo $row2['author']; ?></label>
                <label class="label label-default pull-right">时间：<?php echo $row2['date']; ?></label><br><br>
                <?php echo $row2['content']; ?>
                <hr>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="panel panel-warning">
        <div class="panel-heading">
            <h2 align="center"><strong>在此输入你的回复</strong></h2>
        </div>
        <div class="panel-body">
            <form action="post_reply.php" method="post" name="myForm">
                <input type="hidden" name="reply_id" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label for="author" class="label label-warning">作者</label>
                    <input type="text" id="author" name="author" placeholder="author" class="form-control">
                    <div class="kongkong"></div>
                    <label for="subject" class="label label-warning">主题</label>
                    <input type="text" id="subject" name="subject" placeholder="subject" class="form-control">
                    <div class="kongkong"></div>
                    <label class="label label-warning">内容</label>
                    <textarea name="content" id="" cols="50" rows="5" class="form-control"></textarea>
                    <div class="kongkong"></div>
                    <input type="submit" class="btn btn-primary" value="提交" onclick="check_data()">
                    <input type="reset" class="btn btn-danger" value="清空">
                </div>
            </form>
        </div>
    </div>

</div>
</body>
</html>