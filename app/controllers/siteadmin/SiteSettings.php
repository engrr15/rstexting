<?php
/**
 * Reverse bidding system SiteSettings Class
 *
 * Permits admin to set the site settings like site title,site mission,site offline status.
 *
 * @package		Reverse bidding system
 * @subpackage	Controllers
 * @category	Settings 
 * @author		Cogzidel Dev Team
 * @version		Version 1.0
 * @created		December 22 2008
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
class SiteSettings extends CI_Controller {

	//Global variable  
    public $outputData;		//Holds the output data for each view
	   
	/**
	 * Constructor 
	 *
	 * Loads language files and models needed for this controller
	 */
	public function __construct() {
	  parent::__construct();
	   
	   //Check For Admin Logged in
		if(!isAdmin())
			redirect_admin('login');
	   
	     //Get Config Details From Db
		$this->load->database();
		
		$this->config_data->db_config_fetch();
	   
	    //Debug Tool
	   	//$this->output->enable_profiler=true;
	   	
		// loading the lang files
		$this->lang->load('admin/common', $this->config->item('language_code'));
		$this->lang->load('admin/setting', $this->config->item('language_code'));
		$this->lang->load('admin/validation',$this->config->item('language_code'));
                //Load Models Common to all the functions in this controller
		$this->load->model('common_model');
                $this->load->model('message_model');
                
		$this->outputData['totaltTodayMessages'] = $this->message_model->totaltMessagesByDate(date('Y-m-d'),date('Y-m-d'));
                $this->outputData['totaltMonthMessages'] = $this->message_model->totaltMessagesByDate(date('Y-m').'-01',date('Y-m').'-31');
                $this->outputData['totaltMessages'] = $this->message_model->totaltMessagesByDate('','');
		
	} //Controller End 
	
	// --------------------------------------------------------------------
	
	/**
	 * Loads site settings page.
	 *
	 * @access	private
	 * @param	nil
	 * @return	void
	 */
	function index()
	{	
		$this->load->model('settings_model');
		
		//pr($_POST);
		//load validation library
		$this->load->library('form_validation');		
		
		//Load Form Helper
		$this->load->helper('form');
		
		//Intialize values for library and helpers	
		$this->form_validation->set_error_delimiters($this->config->item('field_error_start_tag'), $this->config->item('field_error_end_tag'));
 
		//Get Form Details
		if($this->input->post('siteSettings'))
		{	
			//Set rules
			$this->form_validation->set_rules('site_title','lang:site_title_validation','required|trim|xss_clean');
			$this->form_validation->set_rules('TWILIO_ACCOUNT_SID','Account SID ','required|trim|xss_clean');
			$this->form_validation->set_rules('TWILIO_ACCOUNT_TOKEN','ACCOUNT TOKEN','required|trim|xss_clean');
                        $this->form_validation->set_rules('TWILIO_FROM_VALID_PHONE_NUMBER','FROM VALID PHONE NUMBER','required|trim|xss_clean');
                        $this->form_validation->set_rules('SITE_SIGNATURE','SITE SIGNATURE','required|trim|xss_clean');
                        $this->form_validation->set_rules('SITE_DEFAULT_TIME','SITE Default time','required|trim|xss_clean');
			
			
			if($this->form_validation->run())
			{	
				$validate = $this->validateFromNumber($this->input->post());
				if($validate != 'success'){
					$this->session->set_flashdata('flash_message', $validate);
					redirect_admin('siteSettings');
				}
			   
				  $updateData                   	= array();
                                  $updateData['site_title']     	= $this->input->post('site_title');
                                  $updateData['TWILIO_ACCOUNT_SID'] 	         = $this->input->post('TWILIO_ACCOUNT_SID');
                                  $updateData['TWILIO_ACCOUNT_TOKEN'] 	         = $this->input->post('TWILIO_ACCOUNT_TOKEN');
                                  $updateData['TWILIO_FROM_VALID_PHONE_NUMBER'] 	         = $this->input->post('TWILIO_FROM_VALID_PHONE_NUMBER');
				  $updateData['created']        	= strtotime(date('Y-m-d H:i:s'));
                                  $updateData['SITE_SIGNATURE']    	= $this->input->post('SITE_SIGNATURE');
                                  $updateData['SITE_DEFAULT_TIME']    	= $this->input->post('SITE_DEFAULT_TIME');
                                  $updateData['SITE_DEFAULT_TIMEZONE']    	= $this->input->post('SITE_DEFAULT_TIMEZONE');
				 // pr($updateData);
				  //Update Site Settings
				
				  $this->settings_model->updateSiteSettings($updateData);
				  
				  //Notification message
				  $this->session->set_flashdata('flash_message', $this->common_model->admin_flash_message('success',$this->lang->line('updated_success')));
				  redirect_admin('siteSettings');
                        } 
		} //If - Form Submission End
		
	   $this->outputData['settings']	 = 	$this->settings_model->getSiteSettings();
	   $this->load->view('admin/settings/siteSettings',$this->outputData);
	   
	}//End of index Function

	public function validateFromNumber($argu = array()){
		$sid = $argu['TWILIO_ACCOUNT_SID'];
		$token = $argu['TWILIO_ACCOUNT_TOKEN'];
		$twilioNumber = $argu['TWILIO_FROM_VALID_PHONE_NUMBER'];
		require $this->config->item('basepath') . "twilio-php/Services/Twilio.php";
		try{
			$client = new Services_Twilio($sid, $token);

			$phoneSID = '';
			$SmsUrl = admin_url('inboundSms/index');
			//$SmsUrl = 'http://rsstexting.com/cron/inboundsms.php';
			$conver_arry = array('SmsUrl' => $SmsUrl);

			foreach($client->account->incoming_phone_numbers->getIterator(0, 1000) as $inPhone){
				if($twilioNumber == $inPhone->phone_number ){
					$phoneSID = $inPhone->sid;
				}
			}
			if($phoneSID != ''){
				$number = $client->account->incoming_phone_numbers->get($phoneSID);
				$number->update($conver_arry);
			}
			$return = 'success';
		}catch(Exception $e){
			$return = $e->getMessage();
		}
		return $return;
	}
	
	// --------------------------------------------------------------------
	
	
	/**
	 * upload_file for both buyer and programmer
	 *
	 * @access	private
	 * @param	nil
	 * @return	void
	 */ 
	function upload_file()
	{
		//pr($_FILES);
		$config['upload_path'] = 'app/css/images';
		$config['allowed_types'] = 'jpeg|jpg|png|gif|JPEG|JPG|PNG|GIF|';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
	
		if($this->upload->do_upload('file'))
		{
			$this->outputData['file'] = $this->upload->data();
	return true;			
		} else {
			$this->form_validation->set_message('upload_file', $this->upload->display_errors($this->config->item('field_error_start_tag'), $this->config->item('field_error_end_tag')));
			return false;
		}//If end 
	}//Function upload_file End
	
	// --------------------------------------------------------------------
	
	
	/**
	 * Get database backup.
	 *
	 * @access	private
	 * @param	nil
	 * @return	void
	 */
	function dbBackup()
	{	
		
		$this->load->dbutil();
		$this->load->helper(array('file', 'download'));
			
		$prefs = array(
						'format'      => 'zip',
						'filename'    => 'db_backup_' . date ("Ymd") . '.zip',
					);

		// Backup your entire database and assign it to a variable
		$backup =& $this->dbutil->backup($prefs);
		write_file('temp/db/' . $prefs['filename'], $backup);
		force_download($prefs['filename'], $backup);
	}//End of database_backup Function
	
}	
//End  SiteSettings Class

/* End of file siteSettings.php */ 
/* Location: ./app/controllers/admin/siteSettings.php */
?>