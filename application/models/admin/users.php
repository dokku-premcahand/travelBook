<?php
class Users extends CI_Model {

	function __constructor()
	{
		parent::__constructor();
	}
	public function authenticate($post=array())
	{
		$password = md5($post['password']);
		$sql = "SELECT id,username,registration_type,user_type,created_on,last_login,activation_link FROM users WHERE username LIKE '%".$post['username']."%' AND password = '".$password."' AND user_type = ".ADMIN;
		$result = $this->db->query($sql)->result()[0];

		return $result;
	}

	public function getUserListing($limit=20,$offset=0){
		$sql = "SELECT SQL_CALC_FOUND_ROWS u.id,u.username,rtm.registration_type AS registration,utm.role as 
				role,u.last_login FROM users u 
				LEFT JOIN registration_type_master rtm ON rtm.id = u.registration_type 
				LEFT JOIN user_type_master utm ON utm.id = u.user_type
				LIMIT ".$offset.",".$limit;
		$result  = $this->db->query($sql)->result();

		$countSql = "SELECT FOUND_ROWS() AS totalCount";
		$countResult = $this->db->query($countSql)->result()[0];

		$dataArray['data'] = $result;
		$dataArray['count'] = $countResult->totalCount;
		return $dataArray;
	}
}
?>