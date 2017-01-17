<?php
/**
 * Reverse bidding system Logout Class
 *
 * Clears the admin session form the back end system.
 *
 * @package		Reverse bidding system
 * @subpackage	Controllers
 * @category	Access Controll
 * @author		Cogzidel Dev Team
 * @version		Version 1.0
 * @created		january 15 2008
 * @link		http://www.cogzidel.com
 
 <Reverse bidding system> 
    Copyright (C) <2009>  <Cogzidel Technologies>
 
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>
    If you want more information, please email me at bala.k@cogzidel.com or 
    contact us from http://www.cogzidel.com/contact

 */
class Logout extends CI_Controller {
	   
    public $outputData;
   /**
	* Constructor 
	*/
	public function __construct() {
	   parent::__construct();
	   
	   //Check For Admin Logged in
//		if(!isAdmin())
//			redirect_admin('login');
			
		//load language
		$this->lang->load('admin/logout',$this->config->item('language_code'));	
                //Load the language file
		$this->lang->load('admin/common', $this->config->item('language_code'));	
		$this->lang->load('admin/login', $this->config->item('language_code'));
		$this->lang->load('admin/validation',$this->config->item('language_code'));
		
		//Load Models Required
		$this->load->model('auth_model');
		$this->load->model('common_model');	

	} //Controller End 
	
	// --------------------------------------------------------------------
	
	/**
	 * Clears Admin Session.
	 *
	 * @access	private
	 * @param	nil
	 * @return	void
	 */
	function index()
	{	
		$this->auth_model->clearAdminSession();	
		
		$this->session->set_flashdata('flash_message', $this->common_model->admin_flash_message('success',$this->lang->line('logout_success')));
		redirect_admin();
		
	}//End of index function
        
        function locked()
	{	
            $this->auth_model->clearAdminSession();	
            $admin_id = $start = $this->uri->segment(4,0);
            $conditions1 = array('Us_id'=>$admin_id);
            		
	 		$this->db->where($conditions1);
			 
	 	$this->db->select('*');
		$result = $this->db->get('users');
		//echo $result->num_rows();exit;
                if($result->num_rows()>0){
                    $row = $result->row();
                    $this->outputData['admin_name']=$row->Us_email;
			//$values = array ('admin_id'=>$row->id,'logged_in'=>TRUE,'admin_role'=>'admin');
                }
		
		
		//load validation library
		$this->load->library('form_validation');		
		
		//Load Form Helper
		$this->load->helper('form');
		
		//Intialize values for library and helpers	
		$this->form_validation->set_error_delimiters($this->config->item('field_error_start_tag'), $this->config->item('field_error_end_tag'));

		//Get Form Details
		if($this->input->post('loginAdmin'))
		{	
                    
			//Set rules
			$this->form_validation->set_rules('pwd','lang:pwd_validation','required|trim|xss_clean');
			
			if($this->form_validation->run())
			{	
                            
				$password = md5($this->input->post('pwd'));
				
				$conditions = array('Us_id'=>$admin_id,'Us_pasword'=>$password);
				//pr($conditions);exit;
				if($this->auth_model->lockedAsAdmin($conditions))
				{
					//Set Session For Admin
					$this->auth_model->setAdminSession($conditions);
					redirect_admin('home');
				
				} else {
					//Log in attempt failed
				  	$this->session->set_flashdata('flash_message', $this->common_model->admin_flash_message('error',$this->lang->line('login_failed')));
				 	//redirect_admin('login');
				}				
			}//If End - Check For Form Validation
		} //IF End- Check For Form Submission	
		
		$this->load->view('admin/locked',$this->outputData);
		
	}//End of index function
	
} 
//Class Logout End

/* End of file logout.php */
/* Location: ./system/application/controllers/admin/logout.php */