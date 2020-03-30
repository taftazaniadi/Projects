<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Nilai extends CI_Model
{
    public function get_list()
    {
        $this->db->select('*,nilai.id as nid,kriteria.nama as knama');
        $this->db->join('kriteria', 'kriteria.id = nilai.kriteria');
        $this->db->join('siswa', 'siswa.nis = nilai.siswa');
        return $this->db->get('nilai')->result();
    }
    public function count()
    {
        $this->db->select('count(*) as c');
        return $this->db->get('nilai')->row();
    }
    public function get_siswa()
    {
        $this->db->select('nis,nama');
        return $this->db->get('siswa')->result();
    }
    public function save()
    {
        $data = $this->input->post();
        array_pop($data);
        $this->db->insert('nilai', $data);
    }
    public function edit($id)
    {
        $data = $this->input->post();
        array_pop($data);
        $this->db->where('id', $id);
        $this->db->update('nilai', $data);
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('nilai');
    }
    public function get_max($id)
    {
        $this->db->select('max(nilai) as m');
        $this->db->where('kriteria', $id);
        return $this->db->get('nilai')->row();
    }
    public function get_min($id)
    {
        $this->db->select('min(nilai) as m');
        $this->db->where('kriteria', $id);
        return $this->db->get('nilai')->row();
    }
    public function normalisasi($id, $val)
    {
        $v = array('normalisasi' => $val);
        $this->db->set($v);
        $this->db->where('id', $id);
        $this->db->update('nilai', $v);
    }
    public function preferensi($id, $val)
    {
        $v = array('preferensi' => $val);
        $this->db->set($v);
        $this->db->where('id', $id);
        $this->db->update('nilai', $v);
    }
    public function reset()
    {
        $v = array(
            'normalisasi' => 0,
            'preferensi' => 0
        );
        $this->db->set($v);
        $this->db->update('nilai', $v);
    }
    public function get_result(){
        $this->db->select('siswa, sum(preferensi) as total');
        $this->db->group_by('siswa');
        return $this->db->get('nilai')->result();
    }
}
