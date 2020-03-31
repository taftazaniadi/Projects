<?php
    defined('BASEPATH') or exit('No direct script access allowed');
class M_Jurusan extends CI_Model{
    public function get_list(){
        return $this->db->get('jurusan')->result();
    }
    public function count(){
        $this->db->select('count(*) as c');
        return $this->db->get('jurusan')->row();
    }
    //dml
    public function save(){
        $data = $this->input->post();
        array_pop($data);
            $this->db->insert('jurusan',$data);
    }
    public function edit($id){
        $data=$this->input->post();
        array_pop($data);
        $this->db->where('id',$id);
        $this->db->update('jurusan',$data);
    }
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('jurusan');
    }
    
    public function reset(){
        $this->db->empty_table('jurusan');
    }


}