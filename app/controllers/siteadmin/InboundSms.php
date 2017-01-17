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
class InboundSms extends CI_Controller {

    public $outputData;
    public $loggedInUser;

    /**
     * Constructor 
     *
     * Loads language files and models needed for this controller
     */
    public function __construct() {
        parent::__construct();
        $this->load->database();

        $this->config_data->db_config_fetch();
        $this->load->model('country_model');
        $this->load->model('message_model');
    }

    function index() {
        if (isset($_POST['From']) && $_POST['From'] != '') {
            $number = $_POST['From'];
            $body = $_POST['Body'];
            $insertData['number'] = $number;
            $insertData['message'] = $body;
            $this->message_model->createInboundMessage($insertData);
        }


        //open connection
//        $fields = array(
//    'msg'    => $body,
//    'mobileno'      => $number
//);
//$url = base_url().'webnotification/twilioInboundSmsNotifications.php';
//$ch = curl_init();
//
////set the url, number of POST vars, POST data
//curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_POST, count($fields));
//curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
//
////execute post
//curl_exec($ch);
////close connection
//curl_close($ch);
        header("content-type: text/xml");
        echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        echo '<Response></Response>';
    }

    function testform() {
        $this->load->view('admin/testform', $this->outputData);
    }

}

//Class Login End 

/* End of file login.php */
/* Location: ./system/application/controllers/admin/login.php */