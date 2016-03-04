<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class md_patient extends CI_Model {

	public $uid;
    public $ibn;
    public $name;
    public $contact;
	public $address;
	public $entry;

    public function __construct(){
        parent::__construct();
    }
	
	public function INFO(){
        $query = $this->db->get('patient');
        return $query->result();
    }
	
	public function ADD($data){
		$this->uid   	= $this->get_id();
        $this->ibn   	= $data['ibn'];
		$this->name    	= $data['name'];
		$this->contact  = $data['contact'];
		$this->address  = $data['address'];
        $this->entry    = time();
        $this->db->insert('patient', $this);
		return $this->uid;
    }
	
	public function EDIT($data){
        $this->uid   	= $data['uid'];
        $this->ibn   	= $data['ibn'];
		$this->name    	= $data['name'];
		$this->contact  = $data['contact'];
		$this->address  = $data['address'];
        $this->entry    = time();
		$this->db->where('uid', $this->uid);
		$this->db->update('patient', $this);
		return $this->uid;
    }
	
	public function TRASH($data){
        $this->uid   	= $data['uid'];
		$this->db->where('uid', $this->uid);
		$this->db->delete('patient');
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