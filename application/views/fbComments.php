<html>
<head>
	<title>FB comment</title>
</head>
<body>
	<h1>Facebook comments <?= $postID;  ?> </h1><br>
	Create date : <?= $post_date  ?> <br>
	message : <?= $post_msg  ?><br>
	<img src=" <?= $post_pic  ?> " alt=""><br>
	Comments : <?= $comments_count  ?> , Likes : <?= $likes_count  ?><br><br>

<table border='1' >
	<tr>
		<td>Profile</td>
		<td>FB-name</td>
		<td>Comment</td>
		<td>Like</td>
		<td>Time</td>
	</tr>
	<?php
		for ($i=0; $i < count($comments); $i++) { ?>
	<tr>
		<td> <img src="<?= $comments[$i]->profile_pic?>"> </td>
		<!-- <td> <?= $comments[$i]->profile_pic ?> </td> -->
		<td > <?= $comments[$i]->from->name  ?> </td>
		<td><?php  echo $comments[$i]->message; checkTag($comments[$i]); checkAttachment($comments[$i]);  ?></td>
		<td><?= $comments[$i]->like_count  ?></td>
		<td><?= $comments[$i]->created_time ?></td>
	</tr>
	<?php } ?>
</table>

</body>
</html>
<?php
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
 ?>
