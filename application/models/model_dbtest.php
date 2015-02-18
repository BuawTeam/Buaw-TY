<?php
/**
 * Created by PhpStorm.
 * User: sitthichok
 * Date: 10/2/2558
 * Time: 14:00
 */
class Model_dbtest extends CI_Model{

    function __construct()
    {
        $this->load->database();
    }

    function getData(){
        return mysql_query("select * from tableTest");
    }

    public function getAll() {
        $query = $this->db->get('tabletest');
//        echo count(($query))."<br>";

//$query = $this->db->get('thetable');

//foreach ($query->result() as $row)
//{
//    echo $row->test_name."<br>";
//}
        return $query->result();
    }

    public function get_row($id) {
        if($id != FALSE) {
            $query = $this->db->get_where('tableTest', array('test_id' => $id));
            return $query->row_array();
        }
        else {
            return FALSE;
        }
    }

}