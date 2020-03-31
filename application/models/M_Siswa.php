<?php
    defined('BASEPATH') or exit('No direct script access allowed');
class M_Siswa extends CI_Model{
    public function get_list(){
        // $this->db->join('kelas');
        $this->db->join('kelas','kelas.id=siswa.kelas');
        $this->db->join('jurusan','kelas.jurusan=jurusan.id');
        return $this->db->get('siswa')->result();
    }
    public function get_siswa($nis){
        $this->db->where('nis',$nis);
        return $this->db->get('siswa')->row();
    }
    public function count(){
        $this->db->select("count(*) as c");
        return $this->db->get('siswa')->row();
    }
    public function get_kelas(){
        return $this->db->get('kelas')->result();
    }
    //dml
    public function save(){
        $data = $this->input->post();
        array_pop($data);
        $this->db->insert('siswa',$data);
    }
    public function edit($nis){
        $data=$this->input->post();
        array_pop($data);
        $this->db->where('nis',$nis);
        $this->db->update('siswa',$data);
    }
    public function delete($nis){
        $this->db->where('nis',$nis);
        $this->db->delete('siswa');
    }
    public function delKelas($id){
        $this->db->where('kelas',$id);
        $this->db->delete('siswa');
    }
    public function isExist($nis){
        $this->db->select('count(*) as c');
        $this->db->where('nis',$nis);
        return $this->db->get('siswa')->row();
    }
    public function reset(){
        $this->db->empty_table('siswa');
    }


}