<?php

/**
 * Reverse bidding system User_model Class
 *
 * helps to achieve common tasks related to the site like flash message formats,pagination variables.
 *
 * @package		Reverse bidding system
 * @subpackage	Models
 * @category	Common_model 
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
  template us from http://www.cogzidel.com/template


 */
class Template_model extends CI_Model {

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
     * create user
     *
     * @access	public
     * @param	string	the type of the flash message
     * @param	string  flash message 
     * @return	string	flash message with proper style
     */
    function createTemplate($insertData = array()) {
        $this->db->insert('template', $insertData);
        return $this->db->insert_id();
    }

//End of createUser Function
    // --------------------------------------------------------------------

    /**
     * Update ProgrammerInvitation
     *
     * @access	private
     * @param	array	an associative array of insert values
     * @return	void
     */
    function updateTemplate($updateKey = array(), $updateData = array()) {
        $this->db->update('template', $updateData, $updateKey);
    }
    
    // --------------------------------------------------------------------
		 
	 /**
	 * Get the package
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */	 
	function getTemplates($conditions=array())
	 {
	 	if(count($conditions)>0)		
	 		$this->db->where($conditions);
		$this->db->where('T_vis <>','99');	 
	 	$this->db->select('*');
		$result = $this->db->get('template');
		return $result;
		
	 }//End of getPackage Function
	//-------------------------------------------------------------------------------- 
        /**
	 * get Package 
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */ 
	 
	 function getTemplate($conditions=array(),$fields='',$like=array(),$limit=array(),$orderby = array())
	 {
	 	//Check For Conditions
	 	if(is_array($conditions) and count($conditions)>0)		
	 		$this->db->where($conditions);
		$this->db->where('T_vis <>','99');	
		//Check For like statement
	 	if(is_array($like) and count($like)>0)		
	 		$this->db->like($like);	
		
		
		//Check For Limit	
		if(is_array($limit))		
		{
			if(count($limit)==1)
	 			$this->db->limit($limit[0]);
			else if(count($limit)==2)
				$this->db->limit($limit[0],$limit[1]);
		}
		//pr($orderby);
		//Check for Order by
		if(is_array($orderby) and count($orderby)>0)
			$this->db->order_by($orderby[0], $orderby[1]);
			 
	 	$this->db->select('*');
		$result = $this->db->get('template');
		return $result;
		
	 }//End of getPackages Function
	//-------------------------------------------------------------------------------------------------- 

//End of updateProgrammerInvitation Function 
}

// End Template_model Class

/* End of file User_model.php */
/* Location: ./app/models/User_model.php */
?>