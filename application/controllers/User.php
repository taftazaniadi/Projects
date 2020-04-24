<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User', 'User');
    }
    public function index($err=0)
    {
        $data['user'] = $this->User->get_list();
        $data['err']=$err;
        $this->load->view('interface/user', $data);
    }
    public function Tambah_user()
    {
        if ($this->input->post('submit')) {
            $c = $this->User->isExist($this->input->post('username'));
            if ($c->c == 0) {
                $this->User->save();
                redirect("User");
            }
            else{
                $err='1';
                redirect('User/'.$err);
            }
        }

    }
    public function Hapus_user($id){
        $this->User->delete($id);
        redirect('User');
    }
}
