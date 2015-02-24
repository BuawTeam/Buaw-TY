<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function getfeed ($fbID){

        $url = "https://graph.facebook.com/".$fbID."/feed?limit=100".'&access_token=1566772446943313|fd4d1e9a8b3ced39e57b3fe7b43b03cd';
     	$requests = file_get_contents($url);
       	$fb_response = json_decode($requests);

		echo "<br>";
    	foreach ($fb_response->data as $item) {
    		if($item->from->name != 'TrueYou'){
    			echo "->message : ".$item->message."<br> ".$item->from->name."<br><br>";
    		}
    	}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */