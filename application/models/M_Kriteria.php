<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Kriteria extends CI_Model
{
    public function count(){
        $this->db->select('count(*) as c');
        return $this->db->get('kriteria')->row();
    }
    public function is100(){
        $this->db->select('sum(bobot) as c');
        return $this->db->get('kriteria')->row();
    }
    public function get_list(){
        return $this->db->get('kriteria')->result();
    }
    public function save(){
        $data = $this->input->post();
        array_pop($data);
        // return $data;
        $this->db->insert('kriteria',$data);
    }
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('kriteria');
    }
    public function edit($id){
        $data=$this->input->post();
        array_pop($data);
        $this->db->where('id',$id);
        $this->db->update('kriteria',$data);
    }
    public function reset()
    {
        // $this->db->where('id','true');
        $this->db->empty_table('kriteria');
        $this->db->query('alter table kriteria auto_increment 1');
    }
}
