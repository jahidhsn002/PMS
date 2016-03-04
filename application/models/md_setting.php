<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class md_setting extends CI_Model {


    public $name;
    public $value;

    public function __construct(){
        parent::__construct();
    }
	
	public function INFO(){
        $query = $this->db->get('setting');
        return $query->result();
    }
	
	public function ADD($data){
		$this->name    	= $data['name'];
		$this->value  	= $data['value'];
        $this->db->insert('setting', $this);
    }
	
	public function EDIT($data){
		$this->name    	= $data['name'];
		$this->value  	= $data['value'];
		$this->db->where('name', $this->name);
		$this->db->update('setting', $this);
		return $this->uid;
    }
	
	public function TRASH($data){
        $this->name   	= $data['name'];
		$this->db->where('name', $this->name);
		$this->db->delete('setting');
    }
	
}