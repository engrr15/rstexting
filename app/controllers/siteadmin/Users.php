<?php

/**
 * Reverse bidding system Users Class
 *
 * Permits admin to manage users and bans.
 *
 * @package		Reverse bidding system
 * @subpackage	Controllers
 * @category	Settings 
 * @author		Cogzidel Dev Team
 * @version		Version 1.0
 * @created		Feb 19 2009
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
class Users extends CI_Controller {

    //Global variable  
    public $outputData;  //Holds the output data for each view

    /**
     * Constructor 
     *
     * Loads language files and models needed for this controller
     */

    public function __construct() {
        parent::__construct();

        //Check For Admin Logged in
        if (!isAdmin())
            redirect_admin('login');

        //Debug Tool
        //$this->output->enable_profiler=true;
        //Get Config Details From Db
        $this->load->database();

        $this->config_data->db_config_fetch();

        // loading the lang files
        $this->lang->load('admin/common', $this->config->item('language_code'));
        $this->lang->load('admin/setting', $this->config->item('language_code'));
        $this->lang->load('admin/validation', $this->config->item('language_code'));
        $this->lang->load('admin/login', $this->config->item('language_code'));

        //Load Models Common to all the functions in this controller
        $this->load->model('common_model');
        $this->load->model('message_model');
        $this->outputData['login'] = 'TRUE';
        
        $this->load->library('form_validation');
        $this->outputData['totaltTodayMessages'] = $this->message_model->totaltMessagesByDate(date('Y-m-d'), date('Y-m-d'));
        $this->outputData['totaltMonthMessages'] = $this->message_model->totaltMessagesByDate(date('Y-m') . '-01', date('Y-m') . '-31');
        $this->outputData['totaltMessages'] = $this->message_model->totaltMessagesByDate('', '');
    }
    function index() {
        redirect_admin('users');
    }
    function editProfile() {
        $adminid = $this->session->userdata('admin_id');
        //load validation library
        
        //Load Form Helper
        $this->load->helper('form');
        //Intialize values for library and helpers	
        $this->form_validation->set_error_delimiters($this->config->item('field_error_start_tag'), $this->config->item('field_error_end_tag'));

        if ($this->input->post('editProfile')) {
            //Set rules
            //$this->form_validation->set_rules('username','lang:username_validation','required|trim|xss_clean|callback__check_username');

            if ($this->input->post('Us_pasword') != "") {
                $this->form_validation->set_rules('Us_pasword', 'lang:password_validation', 'required|trim|min_length[5]|max_length[16]|xss_clean');
            }
            //$this->form_validation->set_rules('email','lang:email_validation','required|trim|valid_email|xss_clean|callback__check_email');
            //$this->form_validation->set_rules('name','lang:name_validation','required|trim|xss_clean');
            $this->form_validation->set_rules('Us_email', 'Email ', 'trim|required|valid_email|xss_clean');
            //$this->form_validation->set_rules('phone_number','lang:phone_number','trim|required|min_length[5]|xss_clean');
            if ($this->form_validation->run()) {
                $updateData = array();
                // $updateData['user_name']     	= $this->input->post('email');


                $updateData['Us_email'] = $this->input->post('Us_email');

                $updateKey = array('Us_id' => $adminid);
                if ($this->input->post('Us_pasword') != "") {
                    $updateData['Us_pasword'] = md5($this->input->post('Us_pasword'));
                }
                if($this->user_model->isUnqueAdmin($updateKey['Us_id'],$updateData['Us_email'])){
                    $this->session->set_flashdata('error_message', $this->common_model->admin_flash_message('error', 'User already exist.'));
                    redirect_admin('users/editProfile');
                }else{
                    $this->user_model->updateAdmin($updateKey, $updateData);
                }
                //pr($updateData);exit;
                //Edit user
                

                //Notification message
                $this->session->set_flashdata('flash_message', $this->common_model->admin_flash_message('success', $this->lang->line('updated_success')));
                redirect_admin('users/editProfile');
            }
        }



        $condition = array('Us_id' => $adminid);
        $data = $this->user_model->viewAdmin($condition);
        $this->outputData['admin'] = $data[0];

        $this->load->view('admin/users/editProfile', $this->outputData);
    }
}

//End  SiteSettings Class

/* End of file siteSettings.php */
/* Location: ./app/controllers/admin/siteSettings.php */
?>