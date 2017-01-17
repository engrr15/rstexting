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
    contact us from http://www.cogzidel.com/contact 
 
 
 */
	 class User_model extends CI_Model {
	 
	/**
	 * Constructor 
	 *
	 */
	  public function __construct(){
			parent::__construct();
				
      }//Controller End
	  
	// --------------------------------------------------------------------
	
	/**
	 * Set Style for the flash messages
	 *
	 * @access	public
	 * @param	string	the type of the flash message
	 * @param	string  flash message 
	 * @return	string	flash message with proper style
	 */
	 
	 function getRoleId($role_name='')
	 {
	 
	 	$conditions = array('role_name'=> $role_name);
	 	$this->db->where($conditions);
	 	$this->db->select('id');
		$query = $this->db->get('roles');		
		$row   = $query->row();
		return $row->id;
	 }//End of flash_message Function
	 
	// --------------------------------------------------------------------
	
	/**
	 * Set Style for the flash messages
	 *
	 * @access	public
	 * @param	string	the type of the flash message
	 * @param	string  flash message 
	 * @return	string	flash message with proper style
	 */
	 
	 function getRoles()
	 {
	 
	 	$this->db->select('id,role_name');
		$query = $this->db->get('roles');		
		return $query->result();
	 }//End of flash_message Function
		
	/**
	 * Update users
	 *
	 * @access	private
	 * @param	array	an associative array of insert values
	 * @return	void
	 */
	 function updateUser($updateKey=array(),$updateData=array())
	 {
	    $this->db->update('users',$updateData,$updateKey);
		 
	 }//End of editGroup Function 
         
	 
	 // --------------------------------------------------------------------
	
         
         // --------------------------------------------------------------------
		
	/**
	 * Update users
	 *
	 * @access	private
	 * @param	array	an associative array of insert values
	 * @return	void
	 */
	 function updateAdminUser($updateKey=array(),$updateData=array())
	 {
	    $this->db->update('users',$updateData,$updateKey);
		 
	 }//End of editGroup Function 
	 
	 
	 function getUsers($conditions=array(),$fields='')
	 {
	 
	 	if(count($conditions)>0)		
	 		$this->db->where($conditions);
			
			//print_r($conditions);
		
		$this->db->from('users');
		$this->db->join('roles', 'roles.id = users.role_id','left');	
		
		if($fields!='')
				$this->db->select($fields);
		else 		
	 		$this->db->select('users.id,roles.role_name,users.user_name,users.name,users.role_id,users.country_symbol,users.message_notify,users.password,users.email,users.city,users.state,users.profile_desc,users.rate,users.project_notify,users.user_status,users.activation_key,users.created,users.last_activity,users.num_reviews,users.user_rating,users.logo,users.refid');
		 
		$result = $this->db->get();
                
		return $result;
		
	 }//End of getUsers Function
         
         function isUnqueAdmin($id,$val)
	 {
			 
	 	$this->db->select('COUNT(Us_id) as TotNum')
                        ->where('Us_id <>',$id)
                        ->where('Us_email',$val)
                        ->where('Us_vis <>','99');
		$result = $this->db->get('users')->row_array();
		return $result['TotNum'];
		
	 }//End of getPackage Function
         
         
	 function viewAdmin($conditions=array())
	 {
		if(count($conditions)>0)		
	 		$this->db->where($conditions);
                $this->db->where('Us_vis <>','99');
		$this->db->from('users');
	 	$this->db->select('*');
		$result = $this->db->get();
		
		return $result->result();
	 }//End of Function 
	 
	  function viewAdminuser($conditions=array())
	 {
		if(count($conditions)>0)		
	 		$this->db->where($conditions);
                $this->db->where('Us_group <>','1');
                $this->db->where('Us_vis <>','99');
	 	$this->db->select('Us_id,Us_email');
		$result = $this->db->get('users');
		
		return $result;
	 }//End of Function 
	 
	 
	 
	 
	 function viewAdmins($conditions=array(),$fields='',$like=array(),$limit=array(),$orderby = array())
	 {
		//Check For Conditions
	 	if(is_array($conditions) and count($conditions)>0)		
	 		$this->db->where($conditions);
		$this->db->where('Us_group <>','1');
                $this->db->where('Us_vis <>','99');
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
			 
	 	$this->db->select('Us_id,Us_email');
		$result = $this->db->get('users');
		return $result;
	 }//End of Function 
	 // --------------------------------------------------------------------
	 
	 /**
	 * insert User details for admin
	 *
	 * @access	public
	 * @param	string	the type of the flash message
	 * @param	string  flash message 
	 * @return	string	flash message with proper style
	 */
	 
	 
	 
	 /**
	 * Update user_list for admin
	 *
	 * @access	private
	 * @param	array	an associative array of update values
	 * @return	void
	 */
	 function updateAdmin($conditions=array(),$updateData=array())
	 {
	    if(count($conditions)>0)		
	 		$this->db->where($conditions);
		$result = $this->db->update('users',$updateData);
		return $result;
		 
	 }//End of Function 
	 
	 
	  function getUsersfromusername($condition='')
	{
		
		$query='SELECT * FROM `users` WHERE '.$condition;
		//$this->db->where($condition);
		//$this->db->select('id,email,user_name');
		//$this->db->from('users');
		$result=$this->db->query($query);
		return($result);
	}
	
	
	function addRemerberme($insertData=array(),$expire)
	{
	
		 $this->auth_model->setUserCookie('uname',$insertData['username'], $expire);
		 $this->auth_model->setUserCookie('pwd',$insertData['password'], $expire);
		 
		}
		
	function removeRemeberme()
	{
	
	  $this->auth_model->clearUserCookie(array('uname','pwd'));
	  
	}	
	
	/**
	 * create user
	 *
	 * @access	public
	 * @param	string	the type of the flash message
	 * @param	string  flash message 
	 * @return	string	flash message with proper style
	 */
	
		
}


// End User_model Class
   
/* End of file User_model.php */ 
/* Location: ./app/models/User_model.php */
?>