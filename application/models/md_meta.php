<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class md_meta extends CI_Model {

	public $id;
    public $name;
    public $value;

    public function __construct(){
        parent::__construct();
    }
	
	public function INFO(){
        $query = $this->db->get('meta');
        return $query->result();
    }
	
	public function ADD($data){
		$this->id   	= $data['id'];
		$this->name    	= $data['name'];
		$this->value  	= $data['value'];
        $this->db->insert('meta', $this);
		return $this->uid;
    }
	
	public function EDIT($data){
        $this->id   	= $data['id'];
		$this->name    	= $data['name'];
		$this->value  	= $data['value'];
		$this->db->where('id', $this->id);
		$this->db->update('meta', $this);
		return $this->uid;
    }
	
	public function TRASH($data){
        $this->uid   	= $data['uid'];
		$this->db->where('uid', $this->uid);
		$this->db->delete('meta');
    }
	
}