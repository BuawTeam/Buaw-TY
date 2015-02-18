<!doctype html>
<html lang="en">
<head>
    <style>
        .tb_header{
            text-align: center;
            color: bisque;
            background-color: #00CC00;
        }
        table{
            margin-bottom: 10px;
        }
        #title{
            margin-left: 200px;
        }
    </style>
    <meta charset="UTF-8">
    <title>TEST</title>
</head>
<body>
    <h1 id="title"> <?= $title ?> </h1><br>
<?php
echo "Row : ".count($query)."<br>";
//    for($i=0;$i<count($query);$i++){
//        echo $i."<br>";
//
//    }
//    echo $row->test_id." ".$row->test_name."<br>";
?>
    <a href="http://localhost/ciSample/index.php/Blog">Back</a>
<table border="1">
    <tr class="tb_header">
        <td>ID</td>
        <td>NAME</td>
    </tr>
    <?php
    foreach ($query as $row){ ?>
    <tr>
        <td><?= $row->test_id?></td>
        <td><?= $row->test_name?></td>
    </tr>
    <?php } ?>
    </table>
    <table border="1">
        <tr class="tb_header">
            <td>ID</td>
            <td>NAME</td>
        </tr>
        <?php
        $size = count($query)-1;
        for($i=$size; $i >= 0; $i-- ){ ?>
            <tr>
                <td><?= $query[$i]->test_id?></td>
                <td><?= $query[$i]->test_name?></td>
            </tr>
        <?php } ?>
</table>
</body>
</html>