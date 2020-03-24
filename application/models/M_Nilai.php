<?php
    defined('BASEPATH') or exit('No direct script access allowed');
class M_Nilai extends CI_Model{
    public function get_list(){
        $this->db->join('siswa','siswa.nis = nilai.siswa');
        return $this->db->get('nilai')->result();
    }
    public function count(){
        $this->db->select('count(*) as c');
        return $this->db->get('nilai')->row();
    }
    public function get_siswa(){
        $this->db->select('nis,nama');
        return $this->db->get('siswa')->result();
    }
    public function save(){
        $data=$this->input->post();
        array_pop($data);
        $this->db->insert('nilai',$data);
    }
    public function edit($id){
        $data=$this->input->post();
        array_pop($data);
        $this->db->where('id',$id);
        $this->db->update('nilai',$data);
    }
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('nilai');
    }
}