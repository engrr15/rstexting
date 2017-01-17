<?php

/**
 * Reverse bidding system SiteSettings Class
 *
 * Permits admin to set the payement settings (ie.Paypal)
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
class Messages extends CI_Controller {

    //Global variable  
    public $outputData;  //Holds the output data for each view

    /**
     * Constructor 
     *
     * Loads language files and models needed for this controller
     */

    public function __construct() {

        parent::__construct();
        require $this->config->item('basepath') . "twilio-php/Services/Twilio.php";

        //Check For Admin Logged in
        if (!isAdmin())
            redirect_admin('login');

        //Debug Tool
        //$this->output->enable_profiler=true;
        //Get Config Details From Db
        $this->load->database();

        $this->config_data->db_config_fetch();


        //Load Models Common to all the functions in this controller 
        $this->load->model('common_model');
        $this->load->model('user_model');
        $this->load->model('contact_model');
        $this->load->model('settings_model');
        $this->load->model('template_model');
        $this->load->model('message_model');

        //Load contactgroup list
        //load validation library
        $this->load->library('form_validation');

        //Load Form Helper
        $this->load->helper('form');
        $this->outputData['totaltTodayMessages'] = $this->message_model->totaltMessagesByDate(date('Y-m-d'), date('Y-m-d'));
        $this->outputData['totaltMonthMessages'] = $this->message_model->totaltMessagesByDate(date('Y-m') . '-01', date('Y-m') . '-31');
        $this->outputData['totaltMessages'] = $this->message_model->totaltMessagesByDate('', '');
    }

    function viewMessage() {
        $order[0] = 'list_order';
        $order[1] = 'ASC';
        $templates = $this->template_model->getTemplate(array(), '', array(), array(), $order);
        $this->outputData['templates'] = $templates;
        $this->load->view('admin/messages/composeMessage', $this->outputData);
    }

    function addTemplate() {
        $this->form_validation->set_rules('message', 'Message ', 'trim|required');
        if ($this->form_validation->run() == true) {
            $insertData = array();
            $message = $insertData['message'] = $this->input->post('message', TRUE);
            $inserted_id = $this->template_model->createTemplate($insertData);
            $updateKey['id'] = $inserted_id;
            $updateData['list_order'] = $inserted_id;
            $this->template_model->updateTemplate($updateKey, $updateData);
            
            $messageHTML = '<li class="dd-item dd3-item" data-id="' . $inserted_id . '">
                    <div class="dd-handle dd3-handle">
                    </div>
                    <div class="dd3-content">' . $message . '</div>
            </li>';
            $ajax_response['id'] = $inserted_id;
            $ajax_response['templateHTML'] = $messageHTML;
            $ajax_response['ok'] = 1;
        } else {
            $errors = $this->form_validation->error_array();
            $ajax_response['message'] = $errors;
            $ajax_response['ok'] = 0;
        }
        echo json_encode($ajax_response);
        exit;
    }
    
    function updateTemplateOrder(){
        $re_order = array();
        $list =  json_decode($_POST['data'], true);
        foreach($list as $key=>$val){
            $re_order[] = $val['id'];
        }
        foreach($re_order as $key=>$val){
            $updateData['list_order']=$key+1;
            $templates = $this->template_model->getTemplates(array('list_order'=>$val))->row();
            $updateKey['id'] = $templates->id;
            $this->template_model->updateTemplate($updateKey,$updateData);
        }
    }
    
    function delete_template() {
        $this->form_validation->set_rules('C_id', 'Template ', 'trim|required');

        if ($this->form_validation->run() == true) {
            $updateData = array();

            $updateKey['id'] = $this->input->post('C_id', TRUE);
            $updateData['T_vis'] = '99';
            $this->template_model->updateTemplate($updateKey, $updateData);

            $ajax_response['message'] = 'Template deleted successfully.';
            $ajax_response['ok'] = 1;
        } else {
            $errors = $this->form_validation->error_array();
            $ajax_response['message'] = $errors;
            $ajax_response['ok'] = 0;
        }
        echo json_encode($ajax_response);
        exit;
    }

    function sendMessage() {

        $message = $this->form_validation->set_rules('message', 'Message ', 'required|trim|xss_clean');
        $media_url = $this->input->post('url[]', TRUE);

        if ($this->form_validation->run()) {
            $id = $this->input->post('id', TRUE);
            $condition = array('C_id' => $id);
            $result = $this->contact_model->getContacts($condition)->row();
            if (is_object($result)) {

                $sid = $this->settings_model->getSettingByCode('TWILIO_ACCOUNT_SID'); //"ACaba8c97c9017f0014424d240a2ab0035"; // Your Account SID from www.twilio.com/user/account
                $token = $this->settings_model->getSettingByCode('TWILIO_ACCOUNT_TOKEN'); //"385b2f48d4044b17bf670915e31d469a"; // Your Auth Token from www.twilio.com/user/account

                $client = new Services_Twilio($sid, $token);
//                $http = new Services_Twilio_TinyHttp(
//                'https://api.twilio.com',
//                array('curlopts' => array(
//                    CURLOPT_SSL_VERIFYPEER => true,
//                    CURLOPT_SSL_VERIFYHOST => 2,
//                ))
//            );
//
//            $client = new Services_Twilio($sid, $token, "2010-04-01", $http);
                $keys = array_keys($media_url, "");

                // foreach empty key, we unset that entry
                foreach ($keys as $k)
                    unset($media_url[$k]);

                if (isset($media_url) && count($media_url) > 0) {
                    $message = $client->account->messages->create(array(
                        'To' => $result->C_phone,
                        'From' => $this->settings_model->getSettingByCode('TWILIO_FROM_VALID_PHONE_NUMBER'),
                        'Body' => $this->input->post('message', TRUE),
                        'MediaUrl' => $media_url,
                    ));
                } else {
                    $message = $client->account->messages->create(array(
                        'To' => $result->C_phone,
                        'From' => $this->settings_model->getSettingByCode('TWILIO_FROM_VALID_PHONE_NUMBER'),
                        'Body' => $this->input->post('message', TRUE)
                    ));
                }


                //print $message->sid;
                //$C_phone = $result->C_phone;
                $ajax_response['ok'] = 1;
            } else {
                $ajax_response['ok'] = 0;
            }
        } else {
            $errors = $this->form_validation->error_array();
            $ajax_response['message'] = $errors;
            $ajax_response['ok'] = 0;
        }
        echo json_encode($ajax_response);
        exit;
    }

    function sendBulkMessage() {
        if ($this->input->post('bulkMessage')) {

            //Set rules
            $this->form_validation->set_rules('groups[]', 'Group ', 'required|trim|xss_clean');
            $this->form_validation->set_rules('message', 'Message ', 'required|trim|xss_clean');
            if ($this->form_validation->run()) {
                $sid = $this->settings_model->getSettingByCode('TWILIO_ACCOUNT_SID');
                $token = $this->settings_model->getSettingByCode('TWILIO_ACCOUNT_TOKEN');
                $from = $this->settings_model->getSettingByCode('TWILIO_FROM_VALID_PHONE_NUMBER');
                $client = new Services_Twilio($sid, $token);

                $groups = $this->input->post('groups', TRUE);
                $message = $this->input->post('message', TRUE);
                $media_url = $this->input->post('url[]', TRUE);
                $keys = array_keys($media_url, "");

                // foreach empty key, we unset that entry
                foreach ($keys as $k)
                    unset($media_url[$k]);
                foreach ($groups as $val) {
                    $condition = array('C_group' => $val);
                    $result = $this->contact_model->getContacts($condition);
                    if ($result->num_rows() > 0) {
                        foreach ($result->result() as $list) {
                            if (isset($media_url) && count($media_url) > 0) {
                                $client->account->messages->create(array(
                                    'To' => $list->C_phone,
                                    'From' => $from,
                                    'Body' => $message,
                                    'MediaUrl' => $media_url,
                                ));
                            } else {
                                $client->account->messages->create(array(
                                    'To' => $list->C_phone,
                                    'From' => $from,
                                    'Body' => $message
                                ));
                            }
                        }
                    }
                }
                $this->session->set_flashdata('flash_message', $this->common_model->admin_flash_message('success', 'message successfully send.'));
                redirect_admin('messages/sendBulkMessage');
            }
        }

        $this->load->view('admin/messages/bulkMessage', $this->outputData);
    }

    function sentMessages() {
        $sid = $this->settings_model->getSettingByCode('TWILIO_ACCOUNT_SID');
        $token = $this->settings_model->getSettingByCode('TWILIO_ACCOUNT_TOKEN');
        $to = $this->input->post('C_phone', TRUE);
        $client = new Services_Twilio($sid, $token);

        $messageObj = $client->account->messages->getIterator(0, 50, array(
            'From' => $this->settings_model->getSettingByCode('TWILIO_FROM_VALID_PHONE_NUMBER'),
            'To' => $to,
        ));
        $msgHTML = '';
        if (!empty($messageObj)) {
            foreach ($messageObj as $message) {
                $msgHTML .= '<div class="timeline-item">
					<div class="timeline-badge">
						<img class="timeline-badge-userpic" src="' . base_url() . 'themes/backend/assets/admin/pages/media/users/avatar80_1.jpg">
					</div>
					<div class="timeline-body">
						<div class="timeline-body-arrow">
						</div>
						<div class="timeline-body-head">
							<div class="timeline-body-head-caption">
								<a href="javascript:;" class="timeline-body-title font-blue-madison"> To ' . $to . '</a>
								<span class="timeline-body-time font-grey-cascade">Date ' . $message->date_sent . '</span>
							</div>
							
						</div>
						<div class="timeline-body-content">
							<span class="font-grey-cascade">' .
                        $message->body
                        . '</span>
						</div>
					</div>
				</div>';

                ///echo print_r($message);//"From: {$message->from}\nTo: {$message->to}\nBody: " . $message->body;
            }
        } else {
            $msgHTML = '';
        }
        echo json_encode(array('msgHTML' => $msgHTML));
    }

    function receivedMessages() {
        $sid = $this->settings_model->getSettingByCode('TWILIO_ACCOUNT_SID');
        $token = $this->settings_model->getSettingByCode('TWILIO_ACCOUNT_TOKEN');
        $from = $to = $this->input->post('C_phone', TRUE);
        $to = $this->settings_model->getSettingByCode('TWILIO_FROM_VALID_PHONE_NUMBER');

        $client = new Services_Twilio($sid, $token);

        $messageObj = $client->account->messages->getIterator(0, 50, array(
            'From' => $from,
            'To' => $to,
        ));
        $msgHTML = '';
        if (!empty($messageObj)) {
            foreach ($messageObj as $message) {
                $msgHTML .= '<div class="timeline-item">
					<div class="timeline-badge">
						<img class="timeline-badge-userpic" src="' . base_url() . 'themes/backend/assets/admin/pages/media/users/avatar80_1.jpg">
					</div>
					<div class="timeline-body">
						<div class="timeline-body-arrow">
						</div>
						<div class="timeline-body-head">
							<div class="timeline-body-head-caption">
								<a href="javascript:;" class="timeline-body-title font-blue-madison"> To ' . $to . '</a>
								<span class="timeline-body-time font-grey-cascade">Date ' . $message->date_sent . '</span>
							</div>
							
						</div>
						<div class="timeline-body-content">
							<span class="font-grey-cascade">' .
                        $message->body
                        . '</span>
						</div>
					</div>
				</div>';

                ///echo print_r($message);//"From: {$message->from}\nTo: {$message->to}\nBody: " . $message->body;
            }
        } else {
            $msgHTML = '';
        }
        echo json_encode(array('msgHTML' => $msgHTML));
    }

//End of function
}

//End  PaymentSettings Class

/* End of file paymentSettings.php */
/* Location: ./app/controllers/admin/paymentSettings.php */
?>