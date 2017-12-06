<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hooks{
    // var $ci;
    // var $db_debug;

    function __construct() {
        
    }

    public function postControllerConstructor(){
        // $this->ci =& get_instance();
        // $this->db_debug = $this->ci->db->db_debug;
        
    }

    public function postController(){
        // $this->ci->db->db_debug;
    }

}
?>