<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Ranking extends CI_Model
{
    public function get_list()
    {
        
        return $this->db->get('ranking')->result();
    }
    public function list_acc(){
    }
    
    public function save($data)
    {
        $this->db->insert('ranking', $data);
    }
    
    public function reset()
    {
        // $this->db->where('id','true');
        $this->db->empty_table('ranking');
        $this->db->query('alter table ranking auto_increment 1');
    }
}
