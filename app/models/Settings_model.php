<?php

/**
 * Reverse bidding system Settings_model Class
 *
 * Update site settings informations in database.
 *
 * @package		Reverse bidding system
 * @subpackage	Models
 * @category	Settings 
 * @author		Cogzidel Dev Team
 * @version		Version 1.0
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
class Settings_model extends CI_Model {

    /**
     * Constructor 
     *
     */
    public function __construct() {
        parent::__construct();
    }

//Controller End
    // --------------------------------------------------------------------

    /**
     * Get site settings information from database
     *
     * @access	private
     * @param	array
     * @return	array	site settings informations in array format
     */
    function getSiteSettings($data = array()) {
        $this->db->select('id, code, name, setting_type,value_type,int_value,string_value,text_value,created');
        $this->db->where('setting_type', 'S');
        $query = $this->db->get('settings');
        foreach ($query->result() as $row) {
            //Conditions based on value type field
            if ($row->value_type == 'I') {
                $data[$row->code] = $row->int_value;
            }//if End
            if ($row->value_type == 'T') {
                $data[$row->code] = $row->text_value;
            }//if End
            if ($row->value_type == 'S') {
                $data[$row->code] = $row->string_value;
            } //if End 
            if ($row->value_type == 'P') {
                $data[$row->code] = $row->string_value;
            }else{
              $data[$row->code] = $row->string_value;
            } //if End 
        }// Foreach End
        return $data;
    }

//End of getSiteSettings Function
    // --------------------------------------------------------------------

    /**
     * Update site settings information.
     *
     * @access	private
     * @param	array	update information related to site
     * @return	void
     */
    function updateSiteSettings($updateData = array()) {
        //pr($updateData);
        //Update
        $data = array('string_value' => $updateData['site_title']);
        $this->db->where('code', 'SITE_TITLE');
        $this->db->update('settings', $data);


        $data = array('string_value' => $updateData['TWILIO_ACCOUNT_SID']);
        $this->db->where('code', 'TWILIO_ACCOUNT_SID');
        $this->db->update('settings', $data);

        $data = array('string_value' => $updateData['TWILIO_ACCOUNT_TOKEN']);
        $this->db->where('code', 'TWILIO_ACCOUNT_TOKEN');
        $this->db->update('settings', $data);

        $data = array('string_value' => $updateData['TWILIO_FROM_VALID_PHONE_NUMBER']);
        $this->db->where('code', 'TWILIO_FROM_VALID_PHONE_NUMBER');
        $this->db->update('settings', $data);

        $data = array('string_value' => $updateData['SITE_SIGNATURE']);
        $this->db->where('code', 'SITE_SIGNATURE');
        $this->db->update('settings', $data);

        $data = array('string_value' => $updateData['SITE_DEFAULT_TIME']);
        $this->db->where('code', 'SITE_DEFAULT_TIME');
        $this->db->update('settings', $data);

        if($this->db->where('code','SITE_DEFAULT_TIMEZONE')->from('settings')->get()->num_rows() > 0){
          $data = array('string_value' => $updateData['SITE_DEFAULT_TIMEZONE']);
          $this->db->where('code', 'SITE_DEFAULT_TIMEZONE');
          $this->db->update('settings', $data);
        }else{
          $this->db->set('code','SITE_DEFAULT_TIMEZONE')->set('string_value',$updateData['SITE_DEFAULT_TIMEZONE'])->set('setting_type','S')->insert('settings');
        }
    }

//End of updateSiteSettings Function

    function getSettingByCode($code) {


        $this->db->where('code', $code);

        $this->db->from('settings');
        $this->db->select('string_value');
        $result = $this->db->get()->row();

        return $result->string_value;
    }

//End of getPageTitleAndMetaData Function
    // --------------------------------------------------------------------
}

// End Settings_model Class
   
/* End of file Settings_model.php */ 
/* Location: ./app/models/Settings_model.php */