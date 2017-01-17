<?php

/**
 * Reverse bidding system Login Class
 *
 * Permits to login to back end of the system.
 *
 * @package		Reverse bidding system
 * @subpackage	Controllers
 * @category	Access Controll
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
class Login extends CI_Controller {

    public $outputData;
    public $loggedInUser;

    /**
     * Constructor 
     *
     * Loads language files and models needed for this controller
     */
    public function __construct() {
        parent::__construct();
        //Check For Admin Logged in
        //if(isAdmin())
        //redirect_admin('home');
        //Get Config Details From Db
        $this->load->database();

        $this->config_data->db_config_fetch();

        //$this->output->enable_profiler=true;
        //Load the language file
        $this->lang->load('admin/common', $this->config->item('language_code'));
        $this->lang->load('admin/login', $this->config->item('language_code'));
        $this->lang->load('admin/validation', $this->config->item('language_code'));

        //load models required
        $this->load->model('common_model');
        $this->load->model('auth_model');
        $this->outputData['login'] = 'TRUE';
        
        $this->load->library('form_validation');
            //Load Form Helper
            $this->load->helper('form');
    }

//Controller Login End
    // --------------------------------------------------------------------

    /**
     * Loads admin login interface.
     *
     * @access	public
     * @param	nil
     * @return	void
     */
    function index() {
        $cookie = $this->auth_model->getUserCookie('remember_jvg');
        if ($cookie != '') {
            $admin_detail = $this->user_model->viewAdmin(array('Us_id' => $cookie));
            $adminObj = $admin_detail[0];
            //$admin_detail->Us_email;
            $this->auth_model->setAdminSession(array('Us_email' => $adminObj->Us_email, 'Us_pasword' => $adminObj->Us_pasword));
            redirect_admin('home');
        } else {
            //load validation library
            

            //Intialize values for library and helpers	
            $this->form_validation->set_error_delimiters($this->config->item('field_error_start_tag'), $this->config->item('field_error_end_tag'));

            //Get Form Details
            if ($this->input->post('loginAdmin')) {
                //Set rules
                $this->form_validation->set_rules('username', 'lang:username_validation', 'required|trim|xss_clean');
                $this->form_validation->set_rules('pwd', 'lang:pwd_validation', 'required|trim|xss_clean');

                if ($this->form_validation->run()) {

                    $username = $this->input->post('username');
                    $password = md5($this->input->post('pwd'));

                    $conditions = array('Us_email' => $username, 'Us_pasword' => $password);
                    //pr($conditions);exit;
                    if ($this->auth_model->loginAsAdmin($conditions)) {
                        //Set Session For Admin
                        $this->auth_model->setAdminSession($conditions);
                        if ($this->input->post('remember') == '1') {
                            $this->auth_model->setUserCookie('remember_osborn', $this->session->userdata('admin_id'), '2592000');
                        }
                        redirect_admin('home');
                    } else {
                        //Log in attempt failed
                        $this->session->set_flashdata('flash_message', $this->common_model->admin_flash_message('error', $this->lang->line('login_failed')));
                        //redirect_admin('login');
                    }
                }//If End - Check For Form Validation
            } //IF End- Check For Form Submission	

            $this->load->view('admin/login', $this->outputData);
        }
    }

//Function Index End

    function forgot_password() {
        $this->form_validation->set_error_delimiters($this->config->item('field_error_start_tag'), $this->config->item('field_error_end_tag'));
        if ($this->input->post('forgotPassword')) {
            $this->form_validation->set_rules('email', 'lang:email_validation', 'required|trim|valid_email|xss_clean');

            if ($this->form_validation->run()) {

                $email = $this->input->post('email');

                $conditions = array('Us_email' => $email);
                $usersData = $this->auth_model->passwordRecovery($conditions);

                if (!empty($usersData)) {
                    $newpassword = '';
                    for ($i = 0; $i < 5; $i++) {
                        $newpassword .=chr(rand(65, 90));
                        $newpassword .=chr(rand(97, 122));
                    }
                    $updateData['Us_pasword'] = md5($newpassword);
                    $updateKey = array('Us_id' => $usersData->Us_id);
                    $this->user_model->updateAdminUser($updateKey, $updateData);

                    //Send Mail
                    $conditionUserMail = array('E_event' => 'forget_password');
                    $this->load->model('email_model');
                    $result = $this->email_model->getEmails($conditionUserMail);
                    $rowUserMailConent = $result->row();
                    $splVars = array("{{first_name}}" => $usersData->Us_email, "{{new_password}}" => $newpassword);

                    $mailSubject = $rowUserMailConent->E_subject;
                    $mailContent = strtr($rowUserMailConent->E_body, $splVars);
                    $toEmail = $usersData->Us_email;
                    $fromEmail = "freelancer@satyaninfotech.com";
                    $headers = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    $headers .= 'From: ' . $fromEmail . "\r\n" .
                            'Reply-To: ' . $fromEmail . "\r\n";
                    $mailContent = '<html><body>' . $mailContent . '</body></html>';
                    @mail($toEmail, $mailSubject, $mailContent, $headers);
                    $msg = "We've just sent a new password to <strong>$email</strong>. Please check your email inbox!";
                    echo json_encode(array('flag' => 1, 'message' => $msg));
                    exit;
                } else {
                    $msg = $this->lang->line('email_not_valid');
                    echo json_encode(array('flag' => 0, 'message' => $msg));
                    exit;
                }
            } else {
                $error_arr = $this->form_validation->error_array();

                $error_msg = reset($error_arr);
                echo json_encode(array('flag' => 0, 'message' => $error_msg));
                exit;
            }
        }
    }

//Function Index End
}

//Class Login End 

/* End of file login.php */
/* Location: ./system/application/controllers/admin/login.php */