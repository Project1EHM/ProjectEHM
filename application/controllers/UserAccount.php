<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAccount extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()

	{
         if ($this->session->userdata('username'))
			redirect('/useraccount/useraccount');
		
   		 $this->load->helper(array('form'));   
		 $this->load->view('loginAdmin');

		
	}

	public function useraccount()
	{
		if (!$this->session->userdata('username'))
			redirect('/useraccount/');

		$this->load->model('useraccount_model');
		$this->load->view('header_common');
		$this->load->view('header');
		$this->load->view('menu');
		if ($this->input->post('search'))
			$this->load->view('userlist',array('data' => $this->useraccount_model->userlist($this->input->post('search'))));
		else
			$this->load->view('userlist',array('data' => $this->useraccount_model->userlist()));
		$this->load->view('footer');
	}

	public function emergency()
	{
		$this->load->model('useraccount_model');
		$this->load->view('header_common');
		$this->load->view('header');
		$this->load->view('menu');
		
		if ($this->input->post('search'))
			$this->load->view('emergency',array('data' => $this->useraccount_model->emergency($this->input->post('search'))));
		else
			$this->load->view('emergency',array('data' => $this->useraccount_model->emergency()));
		$this->load->view('footer');
	}

	public function notify()
	{

		$this->load->model('useraccount_model');
		$this->load->view('header_common');
		$this->load->view('header');
		$this->load->view('menu');
		if ($this->input->post('search'))
			$this->load->view('notify',array('data' => $this->useraccount_model->notify($this->input->post('search'))));
		else
			$this->load->view('notify',array('data' => $this->useraccount_model->notify()));
		$this->load->view('footer');
	}

	public function friendlist()
	{
		$this->load->model('useraccount_model');
		$this->load->view('header_common');
		$this->load->view('header');
		$this->load->view('menu');
		if ($this->input->post('search'))
			$this->load->view('friendlist',array('data' => $this->useraccount_model->friendlist($this->input->post('search'))));
		else
			$this->load->view('friendlist',array('data' => $this->useraccount_model->friendlist()));
		$this->load->view('footer');
	}

	public function emer_call()
	{
		$this->load->model('useraccount_model');
		$this->load->view('header_common');
		$this->load->view('header');
		$this->load->view('menu');
		if ($this->input->post('search'))
			$this->load->view('callemer',array('data' => $this->useraccount_model->emergencycall($this->input->post('search'))));
		else
			$this->load->view('callemer',array('data' => $this->useraccount_model->emergencycall()));
		$this->load->view('footer');
	}


	public function getuser()
	{
		$this->load->model('useraccount_model');
		echo json_encode( $this->useraccount_model->account($this->input->post('id')));
	}

	public function deleteAccount($id){
		$this->load->model('useraccount_model');
		$this->useraccount_model->deleteAccount($id);
		redirect("/useraccount/useraccount");

	}
	
	public function deleteEmergency($id){
		$this->load->model('useraccount_model');
		$this->useraccount_model->deleteEmergency($id);
		redirect("/useraccount/emergency");

	}
	

	public function deleteNotify($id){
		$this->load->model('useraccount_model');
		$this->useraccount_model->deleteNotify($id);
		redirect("/useraccount/notify");


	}
	public function deleteFriendlist($id){
		$this->load->model('useraccount_model');
		$this->useraccount_model->deleteFriendlist($id);
		redirect("/useraccount/friendlist");

	}
	public function deleteCallmer($id){
		$this->load->model('useraccount_model');
		$this->useraccount_model->deleteCallmer($id);
		redirect("/useraccount/emer_call");
	}

public function login()
	{
		$json = array();
		$this->load->model('useraccount_model');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
	//	$device_token = $this->input->post('device_token');
		$datalogin = $this->useraccount_model->login($username,$password);
		if (count($datalogin) == 0)
		{
			redirect('/useraccount/');

		}
		else
		{
			$this->session->set_userdata(array(
				'username'=>$username,
				'firstname'=>$datalogin[0]->firstname,
				'lastname' =>$datalogin[0]->lastname
				));

			redirect('/useraccount/useraccount');
		}

		echo json_encode($json);
	}

	public function logout() {
	$this->session->unset_userdata(array('username','firstname','lastname'));
	redirect('/useraccount');
}

public function search(){

	$this->load->model('useraccount_model');
	$search_term = array(
		'firstname' => $this->input->post('firstname')
	);
	$data['query'] = $this->useraccount_model-> search($search_term);

}

}