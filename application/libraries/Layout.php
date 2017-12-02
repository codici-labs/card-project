<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout{

    public $obj;
    public $layout;
    public $folder;
    public $pagename;

    public function __construct($layout = "layout", $folder="dashboard"){
        $this->obj =& get_instance();
        
        $this->pagename = $this->obj->uri->segment(1);

        $this->setLayout($layout);
        $this->setFolder($folder);
    }

    public function setLayout($layout){
      $this->layout = $layout;
    }
    
    public function setFolder($folder){
      $this->folder = $folder;
    }

    public function view($view, $data=array(), $return=false){
        
        $data["pagename"] = $this->pagename;

        $view = $this->folder . '/' . $view;
        
        $loadedData = array();
        $loadedData['content_for_layout'] = $this->obj->load->view($view,$data,true);

        if($return){
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        }else{
            $this->obj->load->view($this->layout, $loadedData, false);
        }
        
    }
}
?>