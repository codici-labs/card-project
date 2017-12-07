<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hooks{

    function __construct() {
    }

    public function postControllerConstructor(){
        $this->ci =& get_instance();
        $this->ci->db->db_debug = FALSE;
    }

    public function postController(){
    }

}
?>