<?php
	/**
	*
	*/
	class Model_fbComments extends CI_Model
	{

		private $postID ='123';
		private $pageID = "123";
		private $access_token = "";


		function __construct()
		{
			parent::__construct();
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