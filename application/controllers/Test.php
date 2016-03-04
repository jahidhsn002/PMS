<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public $mod_id;
	
	public function __construct(){
        parent::__construct();
        $this->mod_id = 1;
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('md_category');
    }
	
	public function index(){
		$this->load->view('asset/nav');
		$this->load->view('asset/header');
		$this->load->view('test/index');
		$this->load->view('asset/footer');
	}
	
	public function view_category(){
		
		$data['querys'] = $this->md_category->INFO();
		$this->load->view('test/cat',$data);
		
	}
	
	public function add_category(){
		$this->load->view('test/index');
		
		/*
		$data['id'] = $this->mod_id;
		$data['name'] = 'liver';
		$data['detail'] = 'All kind of liver tests are Included';
		$this->md_category->ADD($data);
		*/
		
	}
	
	public function edit_category(){
		
		$data['uid']='new';
		$data['name']='';
		$data['detail']='';
		
		if(!empty($this->uri->segment(3))){
			$querys = $this->md_category->INFO();
			foreach($querys as $query){
				if($this->uri->segment(3)==$query->uid){
					$data['uid']=$query->uid;
					$data['name']=$query->name;
					$data['detail']=$query->detail;
				}
			}
		}
		
		$this->form_validation->set_rules('name', 'Name', 'required|max_length[50]|alpha_dash');
		$this->form_validation->set_rules('detail', 'Detail', 'required|max_length[200]|alpha_numeric_spaces');
		if ($this->form_validation->run() == FALSE){
            $this->load->view('test/edit_cat',$data);
        }else if ($this->form_validation->run() == TRUE && $this->input->post('uid') == 'new'){
			$data['id'] = $this->mod_id;
			$data['name'] = $this->input->post('name');
			$data['detail'] = $this->input->post('detail');
			$this->md_category->ADD($data);
            $this->load->view('success');
        }else{
			$data['uid'] = $this->input->post('uid');
			$data['id'] = $this->mod_id;
			$data['name'] = $this->input->post('name');
			$data['detail'] = $this->input->post('detail');
			$this->md_category->EDIT($data);
			$this->load->view('success');
		}
		
	}
	
	public function delete_category(){
		
		$this->form_validation->set_rules('uid', 'ID', 'required');
		if ($this->form_validation->run() == FALSE){
			$querys = $this->md_category->INFO();
			foreach($querys as $query){
				if($query->uid == $this->uri->segment(3)){
					$data['uid']=$query->uid;
					$this->load->view('test/delete_cat',$data);
				}
			}
		}else{
			$data['uid'] = $this->input->post('uid');
			$this->md_category->TRASH($data);
			$this->load->view('success');
		}
		
	}

	
	
	
}