<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class md_times extends CI_Model {

	public $uid;
    public $pid;
    public $mid;
	public $note;

    public function __construct(){
        parent::__construct();
    }
	
	public function INFO(){
        $query = $this->db->get('times');
        return $query->result();
    }
	
	public function ADD($data){
		$this->uid   	= $this->get_id();
        $this->pid   	= $data['pid'];
		$this->mid    	= $data['mid'];
		$this->note    	= $data['note'];

        $this->db->insert('times', $this);
		return $this->uid;
    }
	
	public function EDIT($data){
        $this->uid   	= $data['uid'];
        $this->pid   	= $data['pid'];
		$this->mid    	= $data['mid'];
		$this->note    	= $data['note'];
		$this->db->where('uid', $this->uid);
		$this->db->update('times', $this);
		return $this->uid;
    }
	
	public function TRASH($data){
        $this->uid   	= $data['uid'];
		$this->db->where('uid', $this->uid);
		$this->db->delete('times');
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