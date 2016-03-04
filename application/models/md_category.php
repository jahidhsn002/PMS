<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class md_category extends CI_Model {

	public $uid;
    public $id;
    public $name;
	public $detail;
	public $entry;

    public function __construct(){
        parent::__construct();
    }
	
	public function INFO(){
        $query = $this->db->get('category');
        return $query->result();
    }
	
	public function ADD($data){
		$this->uid   	= $this->get_id();
        $this->id   	= $data['id'];
		$this->name    	= $data['name'];
		$this->detail  	= $data['detail'];
        $this->entry    = time();

        $this->db->insert('category', $this);
		return $this->uid;
    }
	
	public function EDIT($data){
        $this->uid   	= $data['uid'];
        $this->id   	= $data['id'];
		$this->name    	= $data['name'];
		$this->detail  	= $data['detail'];
        $this->entry    = time();
		$this->db->where('uid', $this->uid);
		$this->db->update('category', $this);
		return $this->uid;
    }
	
	public function TRASH($data){
        $this->uid   	= $data['uid'];
		$this->db->where('uid', $this->uid);
		$this->db->delete('category');
    }
	
	public function get_id(){
		$this->db->where('name', 'id');
        $querys = $this->db->get('setting');
        foreach($querys->result() as $query){
			$id = ( $query->value + 1 );
		}
		$data = array( 'name' => 'id', 'value' => $id );
		$this->db->where('name', 'id');
		$this->db->update('setting', $data);
		return $id;
    }
	
}