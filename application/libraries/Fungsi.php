<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Fungsi
    {
        protected $ci;

        function __construct()
        {
            $this->ci = &get_instance();
        }

        function user_login()
        {
            $this->ci->load->model('M_Auth');
            
            $ID = $this->ci->session->userdata('ID');
            
            $user_data = $this->ci->M_Auth->get($ID)->row();

            return $user_data;
        }
    }
?>