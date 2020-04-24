<?php
    defined('BASEPATH') or exit('No direct script access allowed');
class M_User extends CI_Model{
    public function get_list(){
        return $this->db->get('users')->result();
    }
    
    //dml
    public function save(){
        $data = $this->input->post();
        array_pop($data);
            $this->db->insert('users',$data);
    }
    public function edit($id){
        $data=$this->input->post();
        array_pop($data);
        $this->db->where('id',$id);
        $this->db->update('users',$data);
    }
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('users');
    }
    public function isExist($id){
        $this->db->select('count(*) as c');
        $this->db->where('username',$id);
        return $this->db->get('users')->row();
    }
    
    public function reset(){
        $this->db->empty_table('users');
    }


}