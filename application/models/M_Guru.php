<?php
    defined('BASEPATH') or exit('No direct script access allowed');
class M_Guru extends CI_Model{
    public function get_list(){
        return $this->db->get('guru')->result();
    }
    //dml
    public function save(){
        $data = $this->input->post();
        array_pop($data);
            $this->db->insert('guru',$data);
    }
    public function edit($nik){
        $data=$this->input->post();
        array_pop($data);
        $this->db->where('nik',$nik);
        $this->db->update('guru',$data);
    }
    public function delete($nik){
        $data=Array(
            'wali'=>0
        );
        $this->db->set('wali',0);
        $this->db->where('wali',$nik);
        $this->db->update('kelas',$data);
        $this->db->where('nik',$nik);
        $this->db->delete('guru');
    }
    public function isExist($nik){
        $this->db->select('count(*) as c');
        $this->db->where('nik',$nik);
        return $this->db->get('guru')->row();
    }
    
    public function reset(){
        $this->db->empty_table('guru');
    }


}