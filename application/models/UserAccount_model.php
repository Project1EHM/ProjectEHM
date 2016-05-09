<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAccount_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();

		$this->load->database('default');
	}

    public function login($username,$password)

{
	$this->db->select('*');
	$this->db->from('user_account');
	$this->db->where('username',$username);
	$this->db->where('password',$password);
	return $this->db->get()->result();
}

	public function userlist($searchtrem='')
	{
		$this->db->select('*');
		$this->db->from('user_account');
		if ($searchtrem!='')
			$this->db->like('username',$searchtrem);
		return $this->db->get()->result();
	}

	public function account($id)
	{
		$this->load->helper('url');
		$this->db->select('*');
		$this->db->from('user_account');
		$this->db->where('user_account_id',$id);
		if ($data = $this->db->get()->result()[0]) {
		//$data->image_row = file_get_contents(str_replace('/','\\',FCPATH.$data->images));
			$data->images = base_url() . $data->images;
			return $data;
		}
		else
			return null;
	}

	public function emergency($searchtrem='')
	{
       
		$this->db->select('*');
		$this->db->from('emergency a');
		$this->db->join('user_account b','b.user_account_id = a.user_account_user_account_id' );
		//$this->db->join('user_account c','c.user_account_id = a.target_user_account_id');

		if ($searchtrem!='')
			$this->db->like('emergency_id',$searchtrem);
		return $this->db->get()->result();
	}

 public function notify($searchtrem='')
 {

           $this->db->select('a.notify_id,a.datetime,a.comment,a.user_account_user_account_id,a.target_user_account_id,b.username as username_s,c.username as username_d');
		$this->db->from('notify a');
		$this->db->join('user_account b ','b.user_account_id = a.user_account_user_account_id' );
		$this->db->join('user_account c ','c.user_account_id = a.target_user_account_id' );

        if ($searchtrem!='')
			$this->db->like('notify_id',$searchtrem);
		return $this->db->get()->result();


 }

public function friendlist($searchtrem='')
 {

           $this->db->select('a.friendlist_id,a.friendaccount_id,a.user_account_user_account_id,b.username as username_s,c.username as username_d');
		$this->db->from('friendlist a');
         $this->db->join('user_account b','b.user_account_id = a.user_account_user_account_id' );
         $this->db->join('user_account c','c.user_account_id = a.friendaccount_id');

        if ($searchtrem!='')
			$this->db->like('user_account_user_account_id',$searchtrem);
		return $this->db->get()->result();


 }

public function emergencycall($searchtrem='')
 {

           $this->db->select('emergencycall_id,namecall,numbercall,user_account_user_account_id,username');
		$this->db->from('emergencycall');
         $this->db->join('user_account ','user_account.user_account_id = emergencycall.user_account_user_account_id' );

         if ($searchtrem!='')
			$this->db->like('emergencycall_id',$searchtrem);
		return $this->db->get()->result();


 }

 public function deleteAccount($id){

 		
 		$this->db->delete('user_account', array('user_account_id' => $id));
      

 }

 public function deleteEmergency($id){

 	     $this->db->delete('emergency', array('user_account_user_account_id' => $id));

 		$this->db->delete('emergency', array('emergency_id' => $id));


 }

 public function deleteNotify($id){
 	   $this->db->delete('notify', array('user_account_user_account_id' => $id));

 		$this->db->delete('notify', array('notify_id' => $id));


 }

public function deleteFriendlist($id){
	$this->db->delete('friendlist', array('user_account_user_account_id ' => $id));

 		$this->db->delete('friendlist', array('friendlist_id' => $id));


 }
 public function deleteCallmer($id){
 	$this->db->delete('	emergencycall', array('user_account_user_account_id' => $id));
 	
 		$this->db->delete('	emergencycall', array('emergencycall_id' => $id));
}

public function search($searc_term='default'){
	$this->db->select('*');
	$this->db->from('helpersenior');
	$this->db->like('firstname', $search_term);
	$query =$this->db->get();

   return $query->result_array();

}

}