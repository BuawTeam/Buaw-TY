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
	function parseingFB($postID){
        $this->load->model('model_fbComments');
        $this->model_fbComments->setPostID($postID);
        $limit=$this->makeLimit();

        //if($limit =null){$limit=20;}

        // echo '>> '.$this->model_fbComments->getPostID();

        // $comments = $this->model_fbComments->comments_1();
        $comments = $this->model_fbComments->commentsLimit($limit);
        // $comments =
        $post  = $this->model_fbComments->post(); //Parsing Post
        $likes = $this->model_fbComments->like(); //Parsing likes
        $comments->data = $this->createComments($comments->data); //Parsing comments

        $data['post_pic'] = $this->getPostPic($post); //FB Post pic
        $data['post_msg'] = $post->name; //FB Post mgs
        $data['post_date'] = $this->dateFormat($post->created_time); //FB Post mgs

        $data['comments'] = $comments->data; //FB comments
        $data['comments_count'] = $comments->summary->total_count; //FB total count Comments
        $data['likes_count'] = $likes->summary->total_count; //FB total count Likes
        $data['postID'] = $postID; //FB post ID
        $data['limit'] = $limit;
        $this->load->view('fbComments', $data); //Send prmt to view
    }
    function makeLimit(){
        // $limit = 25;

        if (isset($_GET['limit'])) {
            $limit = $_GET['limit'];
            echo "GET >> ".$limit;
        }
        else{
            echo "GET >> Empty";
            $limit=25;
        }

        if (!ctype_digit($limit)||$limit==0){$limit=25;}
        if ($limit>100) {
            $limit=100;
        }

        echo '  ->> LIMIT : '.$limit."<br>";;
        return $limit;
    }
    function getPostPic($post)
    {
        return $post->images[count($post->images)-1]->source;
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