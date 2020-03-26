<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	private $data;
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Admin', 'Admin');
		$this->load->model('M_Siswa', 'Siswa');
		$this->load->model('M_Nilai', 'Nilai');
		$this->load->model('M_Kriteria', 'Kriteria');
		$this->data['siswa'] = $this->Siswa->get_list();
		$this->data['total'] = $this->Siswa->count();
		$this->data['kelas'] = $this->Siswa->get_kelas();
		$this->data['nilai'] = $this->Nilai->get_list();
		$this->data['count'] = $this->Nilai->count();
		$this->data['listnama'] = $this->Nilai->get_siswa();
		$this->data['kriteria'] = $this->Kriteria->count();
		$this->data['listkriteria'] = $this->Kriteria->get_list();


	}

	public function index()
	{
		$this->load->view('interface/home', $this->data);
	}

	public function Kriteria()
	{
		$this->load->view('interface/kriteria', $this->data);
		// echo json_encode($this->data['listkriteria']);
	}
	public function Tambah_kriteria()
	{
		if ($this->input->post('submit')) {
			$this->Kriteria->save();
			// echo json_encode($data);
			redirect("Admin/Kriteria");
		}
	}
	public function Siswa()
	{


		$this->load->view('interface/siswa', $this->data);
	}
	public function Tambah_siswa()
	{
		if ($this->input->post('submit')) {
			$this->Siswa->save();
			// echo json_encode($data);
			redirect("Admin/Siswa");
		}
	}
	public function Tambah_nilai()
	{
		if ($this->input->post('submit')) {
			// echo json_encode($data);
			$this->Nilai->save();

			redirect("Admin/Nilai");
		}
	}
	public function Edit_siswa($nis)
	{
		if ($this->input->post('submit')) {
			$this->Siswa->edit($nis);
			// echo json_encode($data);
			redirect("Admin/Siswa");
		}
	}
	public function Hapus_siswa($nis)
	{
		$this->Siswa->delete($nis);
		redirect("Admin/Siswa");
	}
	public function Edit_nilai($id)
	{
		if ($this->input->post('submit')) {
			$this->Nilai->edit($id);
			// echo json_encode($data);
			redirect("Admin/Nilai");
		}
	}
	public function Hapus_nilai($id)
	{
		$this->Nilai->delete($id);
		redirect("Admin/Nilai");
	}
	public function Edit_kriteria($id)
	{
		if ($this->input->post('submit')) {
			$this->Kriteria->edit($id);
			// echo json_encode($data);
			redirect("Admin/Kriteria");
		}
	}
	public function Hapus_kriteria($id)
	{
		$this->Kriteria->delete($id);
		redirect("Admin/Kriteria");
	}
	public function Alternatif()
	{
		$this->load->view('interface/alternatif');
	}

	public function Nilai()
	{
		$this->load->view('interface/nilai',$this->data);
	}

	public function Proses()
	{
		$this->load->view('interface/proses');
	}
}
