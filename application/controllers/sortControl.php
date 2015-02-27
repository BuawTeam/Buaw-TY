<?php 
class SortControl extends CI_Controller {
	function sort($sort_by = 'name', $sort_order = 'asc')
	{
		 //from makelimit
		 $limit = 2;
		 $this->load->model('sortModel');

		 //send 3 value to model
		 $results = $this->sortModel->search($limit, $sort_by, $sort_order);

		 //get value from model
		 $data['sortdips'] = $results['rows'];
		 $data['num_results'] = $results['num_rows'];

		 //pagination
		 $this->load->library('pagination');
		 $config = array();
		 $config['base_url'] = site_url('sortControl/sort');
		 $config['total_rows'] = $data['num_results'];
		 $config['per_page'] = $limit;
		 $config['uri_segment'] = 3;

		 $this->pagination->initialize($config);
		 $data['pagination'] = $this->pagination->create_links();
		 

		 $this->load->view('sortView', $data);




	}
}

?>