<?php
	/**
	*
	*/
	class Model_fbComments extends CI_Model
	{

		private $postID ='123';
		private $pageID = "123";
		private $access_token = "";
		private $allComments;


		function __construct()
		{
			parent::__construct();
		}
		function setAllComments($comments)
		{
			 // $this->allComments->data += $comments->data;
			foreach ($comments->data as $item) {
				array_push($this->allComments->data, $item);
			}
		}
		public function getAllComments(){

			return $this->allComments->data;
		}
		function setPostID($id){

			$this->postID = $id;
		}
		function getPostID(){

			return $this->postID;
		}
		function setPageID($id){

			$this->pageID = $id;
		}
		function getPageID(){

			return $this->pageID;
		}

		public function Paging($limit)
		{
			// 861860773875368/comments?fields=paging&summary=true&limit=10
			// $graphUrl = "http://graph.facebook.com/861860773875368/comments?&summary=true&limit=".$limit;
			$graphUrl = "https://graph.facebook.com/861860773875368/comments?&fields=message,id,from,attachment,like_count,message_tags,created_time&summary=true&limit=".$limit;
			echo $graphUrl;
			$requests = file_get_contents($graphUrl);
			$fb_response = json_decode($requests);
			// $fb_response = $fb_response->comments;
			$this->allComments = $fb_response;

			$comments_count = $fb_response->summary->total_count;
			$page_count = ($comments_count/$limit);
			$after = $fb_response->paging->cursors->after;
			// echo "AFTER >> ".$fb_response->paging->cursors->after;
			echo "<br>Comments : ".$comments_count."<br>";
			echo "Paging : ".$page_count."<br><br>";
			for ($i=0; $i < $page_count; $i++) {

				if($i>0){
					// $graphUrl = "http://graph.facebook.com/861860773875368/comments?&summary=true&limit=".$limit;
					$graphUrl = "https://graph.facebook.com/861860773875368/comments?&fields=message,id,from,attachment,like_count,message_tags,created_time&summary=true&limit=".$limit;

					$graphUrl = $graphUrl."&after=".$after;
					// echo $graphUrl;
					// $requests = file_get_contents($graphUrl);
					// $fb_response = json_decode($requests);

					// $after = $fb_response->paging->cursors->after;
					$after = $this->getComments($graphUrl);
				}

				echo '<a href="'.$graphUrl.'">'.$graphUrl.'</a><br>Page '.$i.' :> AFTER = '.$after."<br><br>";
				$urlarray[$i] = $graphUrl; 
				$iarray[$i] = $i;
			}
			return array("url" => $urlarray,"countpage" => $iarray);
			echo '<br> >>>>> '.count($this->allComments->data)."<br>".$this->allComments->data[count($this->allComments->data)-1]->id.'<br>';


		}
		function getComments($graphUrl)
		{
			// $graphUrl = "http://graph.facebook.com/".$this->postID."/comments?summary=1";
			$requests = file_get_contents($graphUrl);
       	 	$fb_response = json_decode($requests);
       	 	// $fb_response = $fb_response->comments;
       	 	$this->setAllComments($fb_response);

       	 	return $fb_response->paging->cursors->after;

		}

		function comments()
		{
			$graphUrl = "http://graph.facebook.com/".$this->postID."/comments?summary=1";
			$requests = file_get_contents($graphUrl);
       	 	$fb_response = json_decode($requests);

       	 	return $fb_response->data;

		}
		function comments_1()
		{
			// $graphUrl = "http://graph.facebook.com/".$this->postID."/comments?summary=1";
			$graphUrl = "http://graph.facebook.com/".$this->postID."?fields=comments.limit(100).summary(true){message,id,from,attachment,like_count,message_tags,created_time}";
			$requests = file_get_contents($graphUrl);
       	 	$fb_response = json_decode($requests);

       	 	// return $fb_response;
       	 	return $fb_response->comments;

		}
		function commentsLimit($limit)
		{
			// $graphUrl = "http://graph.facebook.com/".$this->postID."/comments?summary=1";

			$graphUrl = "http://graph.facebook.com/".$this->postID."?fields=comments.limit(".$limit.").summary(true){message,id,from,attachment,like_count,message_tags,created_time,comments.limit(50){message,from,attachment}}";
			//$graphUrl = "http://graph.facebook.com/".$this->postID."?fields=comments.limit(100).summary(true){message,id,from,attachment,like_count,message_tags,created_time}";
			echo $graphUrl;
			$requests = file_get_contents($graphUrl);
       	 	$fb_response = json_decode($requests);

       	 	// return $fb_response;
       	 	return $fb_response->comments;

		}
		function like()
		{
			$graphUrl = "http://graph.facebook.com/".$this->postID."/likes?summary=1";
			$requests = file_get_contents($graphUrl);
       	 	$fb_response = json_decode($requests);

       	 	return $fb_response;

		}
		function post()
		{
			$graphUrl = "http://graph.facebook.com/".$this->postID;
			$requests = file_get_contents($graphUrl);
       	 	$fb_response = json_decode($requests);

       	 	return $fb_response;

		}
		private function feed(){
			$graphUrl = "http://graph.facebook.com/".$this->pageID."/feed?access_token=".$this->access_token;
			$requests = file_get_contents($graphUrl);
       	 	$fb_response = json_decode($requests);

       	 	return $fb_response;
		}
	}
 ?>