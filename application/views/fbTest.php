<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
$fb_url = 'http://graph.facebook.com/'.$username;
$fb_profile = $fb_url."/picture/";
$opengraph=file_get_contents($fb_url);
$opengraph=json_decode($opengraph);
$name=$opengraph->name;
$link=$opengraph->link;
$id=$opengraph->id;
$gender=$opengraph->gender;
?>
<h1>Facebook parsing</h1><br>
URL : <a href="<?= $fb_url ?>"><?= $fb_url ?></a> <br><br>
<table border="1">
    <tr>
        <td>Profile IMG</td>
        <td><img src=<?=$fb_profile?>></td>
    </tr>
    <tr>
        <td>ID</td>
        <td><?php echo($id);?></td>
    </tr>
    <tr>
        <td>Name</td>
        <td><?php echo($name);?></td>
    </tr>
    <tr>
        <td>Gender</td>
        <td><?php echo($gender);?></td>
    </tr>
    <tr>
        <td>URL</td>
        <td><a href="<?php echo($link);?>"><?php echo($link);?></a></td>
    </tr>
</table>




</body>
</html>