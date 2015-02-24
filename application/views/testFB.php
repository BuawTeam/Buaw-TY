<html>
<head>
    <title>TEST-FB</title>
</head>
<body>
    <?php $comments = createComments($comments); ?>
<table border='1' >
    <tr>
        <td>no.</td>
        <td>Profile</td>
        <td>FB-name</td>
        <td>Comment</td>
        <td>Like</td>
        <td>Time</td>
    </tr>
    <?php
        for ($i=0; $i < count($comments); $i++) { ?>
    <tr>
        <td><?=$i+1  ?></td>
        <td> <img src="<?= $comments[$i]->profile_pic?>"> </td>
        <!-- <td> <?= $comments[$i]->profile_pic ?> </td> -->
        <td > <?= $comments[$i]->from->name  ?> </td>
        <td><?php  echo checkLink($comments[$i]->message); checkTag($comments[$i]); checkAttachment($comments[$i]);  checkReply($comments[$i]);?></td>
        <td><?= $comments[$i]->like_count  ?></td>
        <td><?= $comments[$i]->created_time ?></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
<?php
    function checkLink($text){
        $pattern = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        $text= preg_replace($pattern, "<a href=\"\\0\"?phpMyAdmin=uMSzDU7o3aUDmXyBqXX6JVQaIO3&phpMyAdmin=8d6c4cc61727t4d965138r21cd rel=\"nofollow\">\\0</a>", $text);

        return $text;
    }
     function checkTag($item){
        if(!empty($item->message_tags)){
            echo "<br>@Tag : ".count($item->message_tags)."<br>";
            foreach ($item->message_tags as $tag) {
                        // echo $tag->name."<br>";
                echo "<a href='https://www.facebook.com//".$tag->id."'>".$tag->name."</a> ,";
            }
        }
    }
     function checkAttachment($item){
        if(!empty($item->attachment->media->image->src)){
            echo "<br>@attachment : <br>";
                echo '<img src="'.$item->attachment->media->image->src.'" width="210">';
            }

    }
    function checkReply($item){
        if(!empty($item->comments)){
            echo "<br>@Reply : ".count($item->comments->data)."<br>";
            foreach ($item->comments->data as $reply) {
                echo checkLink("&nbsp&nbsp&nbsp - ".$reply->from->name." : ".$reply->message)."<br>";
                // checkAttachment($reply);
                // echo $comments[$i]->message; checkTag($comments[$i]); checkAttachment($comments[$i]).'<br>';
            }
         }

    }

    function createComments($comments){

        foreach ($comments as $item) {
            $item->created_time = dateFormat($item->created_time);
            // array_push($item,$this->getProfilePic($item->from->id));
            $item->profile_pic = getProfilePic($item->from->id);
        }
        return $comments;
    }
    function getProfilePic($userID){
        $fb_profile = "http://graph.facebook.com/".$userID."/picture/";
        return $fb_profile;
    }
    function dateFormat($createDate){
        $timestamp = strtotime($createDate);
        $php_timestamp_date = date("d/m/y H:i:s", $timestamp);
        return $php_timestamp_date."";
    }
 ?>