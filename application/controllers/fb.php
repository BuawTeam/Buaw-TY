<?php
/**
*
*/
class FB extends CI_Controller
{
	function index(){
//        $this->load->view('test');
        echo '<a href="http://localhost/ciSample/index.php/Blog/showAll">Select all</a>';
    }

	// function __construct(argument)
	// {

	// }
	function parseingFB_1($postID){
        $this->load->model('model_fbComments');
        $this->model_fbComments->setPostID($postID);
        // echo '>> '.$this->model_fbComments->getPostID();

        $comments = $this->model_fbComments->comments_1();
        $post = $this->model_fbComments->post(); //Parsing Post
        $likes = $this->model_fbComments->like(); //Parsing likes
        $comments->data = $this->createComments($comments->data); //Parsing comments

        $data['post_pic'] = $this->getPostPic($post); //FB Post pic
        $data['post_msg'] = $post->name; //FB Post mgs
        $data['post_date'] = $this->dateFormat($post->created_time); //FB Post mgs

        $data['comments'] = $comments->data; //FB comments
        $data['comments_count'] = $comments->summary->total_count; //FB total count Comments
        $data['likes_count'] = $likes->summary->total_count; //FB total count Likes
        $data['postID'] = $postID; //FB post ID
        $this->load->view('fbComments', $data); //Send prmt to view
    }
    function getPostPic($post)
    {
        return $post->images[count($post->images)-1]->source;
    }

    function createComments_1($comments){

        foreach ($comments as $item) {
            $item->created_time = $this->dateFormat($item->created_time);
            // array_push($item,$this->getProfilePic($item->from->id));
            $item->profile_pic = $this->getProfilePic($item->from->id);
        }
        return $comments;
    }
    function createComments($comments){

        foreach ($comments as $item) {
            $item->created_time = $this->dateFormat($item->created_time);
            // array_push($item,$this->getProfilePic($item->from->id));
            $item->profile_pic = $this->getProfilePic($item->from->id);
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
}
 ?>