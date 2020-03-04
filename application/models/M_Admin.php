<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class M_Admin extends CI_Model
    {
        public function get_admin()
        {
            $id = $this->session->userdata('ID');

            $this->db->select('*')
                ->where('Level', 1)
                ->where('ID', $id);
            
            $query = $this->db->get('users');

            return $query;
        }
    }
?>