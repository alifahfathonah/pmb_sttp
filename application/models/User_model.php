<?php

class User_model extends CI_Model
{
    private $_table="users";

    public function doLogin()
    {
        $password=$this->input->post('word_pass');
        $username=$this->input->post('name_user');
        $user=$this->db->get_where($this->_table, ['name_user'=>$username])->row_array();

        if ($user && $user['lvl_user']==3) {
            if (password_verify($password, $user['word_pass'])) {
                $data=[
                    'id_user'=>$user['id_user'],
                    'name_user'=>$user['name_user'],
                    'lvl_user'=>$user['lvl_user'],
                ];
                $this->session->set_userdata(['user_logged'=>$data]);
                return true;
            }else{
                $this->session->set_flashdata('errP','Wrong Password or Blocked');
                redirect(site_url('adminku')); 
            }
        }elseif($user && $user['lvl_user']==2 && $user['word_pass']==$password){
            $data=[
                'id_user'=>$user['id_user'],
                'name_user'=>$user['name_user'],
                'lvl_user'=>$user['lvl_user'],
            ];
            $this->session->set_userdata(['user_logged'=>$data]);
            return true;
        }else{
            $this->session->set_flashdata('errP','Wrong Username');
            $this->session->set_flashdata('errP','Wrong Password or Blocked');
            redirect(site_url('adminku')); 
        }
    }

    public function doLogout()
    {
       $this->session->sess_destroy();
       return true;
   }

   public function get_data()
   {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where('users.lvl_user',2);
    $query=$this->db->get();
    return $query;
}

}



?>