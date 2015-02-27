<?php
	/**
	*
	*/
	class SortModel extends CI_Model
	{
		//use 3 value to query
		function search($limit, $sort_by, $sort_order){
			//data
			$datarray = array(
			array(
				'sid' => '1',
		 		'name' => 'a'
		 	),
		 	array(
		 		'sid' => '9',
		 		'name' => 'c' 
		 	),
		 	array(
		 		'sid' => '5',
		 		'name' => 'b' 
		 	),
		 	array(
		 		'sid' => '6',
		 		'name' => 's' 
		 	),
		 	array(
		 		'sid' => '7',
		 		'name' => 'e' 
		 	)
		 );
			//get data from array
			$ret['rows'] = $datarray;

			//count data array
			$q = count($datarray);
			$tmp = $q;
			$ret['num_rows'] = $q;

			//return to sortControl
			return $ret;

		}
		






	}
 ?>