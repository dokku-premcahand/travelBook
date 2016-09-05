<?php
class Users extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function authenticate($postData)
    {
        $password  = md5($postData['password']);
        $sql = "SELECT * FROM users WHERE username LIKE '%".$postData['username']."%' AND password = '".$password."'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result[0];
    }

    public function socialLogin($data)
    {
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO users VALUES ('','".$data['email']."','','".$data['registration_type']."','".$date."','".$date."');";
        $result = $this->db->query($sql);
        $userData = $this->getUserFromId($this->db->insert_id());
        
        return $userData;
    }

    public function checkEmail($emailId)
    {
        $sql = "SELECT count(*) AS count FROM users WHERE username LIKE '%".$emailId."%'";
        $query = $this->db->query($sql);
        $result = $query->result();
        
        return $result[0]->count;
    }

    public function getUserFromId($userId){
        $sql = "SELECT * FROM users WHERE id = ".$userId;
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result[0];
    }

    public function getUserFromEmailId($emailId)
    {
        $sql = "SELECT * FROM users WHERE username LIKE '%".$emailId."%'";
        $query = $this->db->query($sql);
        $result = $query->result();
        
        return $result[0];
    }

    public function userRegistration($postData){
        $date = date("Y-m-d H:i:s");
        $randPassword = random_string ('alnum',8);
        $password = md5($randPassword);
        $fileName = time().'.jpg';

        $imageUpload = $this->uploadProfilPicture($fileName);
        if(empty($imageUpload['error'])){
            $sql = "INSERT INTO users (`username`,`password`,`registration_type`,`activation_link`,`profile_picture`,`last_login`,`created_on`) VALUES (".$this->db->escape($postData['email']).",'".$password."',".CONT_WEBSITE.",'".$password."','".$fileName."','".$date."','".$date."');";
            $query = $this->db->query($sql);
            $result = $this->db->affected_rows();

            if($result == 1){
                $this->sendRegistrationEmail($password,$randPassword);
                $message['success'] = 'Email verification link and password have been sent to your registered email address.';
            }else{
                delete_files('./public/images/profile_picture/'.$fileName);
                $message['error'] = 'Error occurred. Please try after sometime.';
            }
            return $message;
        }else{
            return $imageUpload['error'];
        }
    }

    public function uploadProfilPicture($fileName)
    {
        $config['upload_path']          = './public/images/profile-images';
        $config['allowed_types']        = 'jpg';
        $config['max_size']             = 10240;
        $config['file_name']            = $fileName;
        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('profile_picture')){
            $data['error'] = array('error' => $this->upload->display_errors());
        }
        else{
            $data['fileData'] = $this->upload->data();
        }
        return $data;
    }

    public function verifyEmailId($string)
    {
        $sql = "SELECT count(id) AS count,id FROM users WHERE activation_link LIKE '%".$string."%'";
        $query = $this->db->query($sql);
        $result = $query->result();
        
        if($result[0]->count > 0){
            $insertSQL = "UPDATE users SET activation_link = '' WHERE id = ".$result[0]->id;
            $this->db->query($insertSQL);
        }
        return $result;
    }

    public function sendRegistrationEmail($password,$randPassword){
        // $this->load->config('email');
    }
}
?>