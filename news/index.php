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
            height: 30px;
        }
        .form-control{
            width: 400px;
        }
    </style>
</head>
<body>
<div class="container">

    <h1 align="center">讨论区</h1>
    <?php
    require_once 'dbtools.inc.php';

    $records_per_page=5;

    if(isset($_GET['page'])){
        $page=$_GET['page'];
    }else{
        $page=1;
    }

    $sql="select * from message order by date desc";

    $result=mysqli_query($conn,$sql);

    $total_records=mysqli_num_rows($result);

    $total_pages=ceil($total_records/$records_per_page);

    $started_record=$records_per_page*($page-1);

    mysqli_data_seek($result,$started_record);

    $j=1;
    while($row=mysqli_fetch_assoc($result) and $j<=$records_per_page){
        ?>
        <div class="panel panel-success">
            <div class="panel-heading">
                <label class="label label-primary">作者：<?php echo $row['author']; ?></label><br>
                <label class="label label-info">主题：<?php echo $row['subject']; ?></label>
                <label class="label label-default pull-right">时间：<?php echo $row['date'] ?></label>
            </div>
            <div class="panel-body">
                <a href="show_news.php?id=<?php echo $row['id']; ?>">阅读与加入讨论</a>
            </div>
        </div>
        <?php
        $j++;
    }
    ?>

    <p align="center">
        <?php
        if($page>1){
            echo "<a href='index.php?page=".($page-1)."' class='btn btn-link'>上一页</a>";
        }
        for($i=1;$i<=$total_pages;$i++){
            if($i==$page)
                echo "$i";
            else
                echo "<a href='index.php?page=$i' class='btn btn-link'>$i</a>";
        }
        if($page<$total_pages){
            echo "<a href='index.php?page=".($page+1)."' class='btn btn-link'>下一页</a>";
        }
        ?>
    </p>

    <form action="post.php" name="myForm" method="post">
        <div class="form-group">
            <div align="center" class="alert alert-info">
                <h2>
                    <label class="label label-warning">请在此输入新的讨论</label>
                </h2>
            </div>
            <label class="label label-warning" for="author">作者 </label>
            <input type="text" name="author" class="form-control" id="author" placeholder="author">
            <div class="kongkong"></div>
            <label class="label label-warning" for="subject">主题 </label>
            <input type="text" name="subject" class="form-control" id="subject" placeholder="subject">
            <div class="kongkong"></div>
            <label class="label label-warning">内容 </label>
            <textarea name="content" id="" cols="50" rows="5" class="form-control"></textarea><br>
            <div class="kongkong"></div>
            <input type="button" value="发表" onclick="check_data()" class="btn btn-primary">
            <input type="reset" value="重新输入" class="btn btn-danger">
        </div>
    </form>

</div>
</body>
</html>