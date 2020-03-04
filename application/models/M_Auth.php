<?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class M_Auth extends CI_Model
    {
        public function get($id = null)
        {
            $this->db->select('*');

            if ($id != null)
            {
                $this->db->where('ID', $id);
            }

            $query = $this->db->get('users');

            return $query;
        }

        public function login($post)
        {
            $this->db->select('*')
                ->where('Username', $post['username']);
                // ->where('Password', $post['pass']);

            $query = $this->db->get('users');

            return $query;
        }

        public function get_pass($username)
        {
            $this->db->select('*')
                ->where('Username', $username);

            $query = $this->db->get('users');

            return $query;
        }   
    }
?>