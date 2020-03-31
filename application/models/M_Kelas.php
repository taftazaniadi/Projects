<?php
    defined('BASEPATH') or exit('No direct script access allowed');
class M_Kelas extends CI_Model{
    public function get_list(){
        $this->db->select('*,kelas.id as kid, guru.nik as gid');
        $this->db->join('jurusan','jurusan.id=kelas.jurusan');
        $this->db->join('guru','guru.nik=kelas.wali');
        return $this->db->get('kelas')->result();
    }
    public function count(){
        $this->db->select('count(*) as c');
        return $this->db->get('kelas')->row();
    }
    //dml
    public function save(){
        $data = $this->input->post();
        array_pop($data);
            $this->db->insert('kelas',$data);
    }
    public function edit($id){
        $data=$this->input->post();
        array_pop($data);
        $this->db->where('id',$id);
        $this->db->update('kelas',$data);
    }
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('kelas');
    }
    public function isExist($a,$j){
        $this->db->select('count(*) as c');
        $this->db->where('alias',$a);
        $this->db->where('jurusan',$j);
        return $this->db->get('kelas')->row();
    }
    public function byJurusan($id){
        $this->db->select('id');
        $this->db->where('jurusan',$id);
        return $this->db->get('kelas')->result();
    }
    public function reset(){
        $this->db->empty_table('kelas');
    }


}