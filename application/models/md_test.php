<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class md_test extends CI_Model {

	public $uid;
    public $pid;
    public $name;
    public $cat;
	public $note;
	public $entry;

    public function __construct(){
        parent::__construct();
    }
	
	public function INFO(){
        $query = $this->db->get('test');
        return $query->result();
    }
	
	public function ADD($data){
		$this->uid   	= $this->get_id();
        $this->pid   	= $data['pid'];
		$this->name    	= $data['name'];
		$this->cat  	= $data['cat'];
		$this->note    	= $data['note'];
        $this->entry    = time();

        $this->db->insert('test', $this);
		return $this->uid;
    }
	
	public function EDIT($data){
        $this->uid   	= $data['uid'];
        $this->pid   	= $data['pid'];
		$this->name    	= $data['name'];
		$this->cat  	= $data['cat'];
		$this->note    	= $data['note'];
        $this->entry    = time();
		$this->db->where('uid', $this->uid);
		$this->db->update('test', $this);
		return $this->uid;
    }
	
	public function TRASH($data){
        $this->uid   	= $data['uid'];
		$this->db->where('uid', $this->uid);
		$this->db->delete('test');
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