<?php
class Testmodel extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor

        parent::__construct();
        $this->load->database();
    }

    function get_last_ten_entries()
    {
        $query = $this->db->get('tutorials', 10);
         if ($query-> num_rows() > 0){
            foreach ($query-> result_array() as $row){
            $data[] = $row;
            }
        }

        $query-> free_result();

        return $data;  
    }

    function insert_entry()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}
?>