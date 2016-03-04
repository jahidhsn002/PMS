<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class md_desise extends CI_Model {

	public $uid;
    public $name;
    public $cause;
	public $category;
	public $suggest;
	public $entry;

    public function __construct(){
        parent::__construct();
    }
	
	public function INFO(){
        $query = $this->db->get('desise');
        return $query->result();
    }
	
	public function ADD($data){
		$this->uid   	= $this->get_id();
		$this->name    	= $data['name'];
		$this->cause  	= $data['cause'];
		$this->category = $data['category'];
		$this->suggest  = $data['suggest'];
        $this->entry    = time();

        $this->db->insert('desise', $this);
		return $this->uid;
    }
	
	public function EDIT($data){
        $this->uid   	= $data['uid'];
        $this->name    	= $data['name'];
		$this->cause  	= $data['cause'];
		$this->category = $data['category'];
		$this->suggest  = $data['suggest'];
        $this->entry    = time();
		$this->db->where('uid', $this->uid);
		$this->db->update('desise', $this);
		return $this->uid;
    }
	
	public function TRASH($data){
        $this->uid   	= $data['uid'];
		$this->db->where('uid', $this->uid);
		$this->db->delete('desise');
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