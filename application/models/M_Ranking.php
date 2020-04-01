<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Ranking extends CI_Model
{
    public function get_list()
    {
        $this->db->join('siswa','siswa.nis=ranking.siswa');
        $this->db->join('kelas','siswa.kelas = kelas.id');
        $this->db->join('jurusan','jurusan.id = kelas.jurusan');
        $this->db->order_by('peringkat');
        return $this->db->get('ranking')->result();
    }
    public function list_acc(){
        $this->db->select('count(*) as c');
        $this->db->where('keputusan','diterima');
        return $this->db->get('ranking')->row();
    }
    public function list_dec(){
        $this->db->select('count(*) as c');
        $this->db->where('keputusan','ditolak');
        return $this->db->get('ranking')->row();
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
