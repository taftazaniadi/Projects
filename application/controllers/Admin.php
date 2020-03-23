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
		$this->data['siswa'] = $this->Siswa->get_list();
		$this->data['total'] = $this->Siswa->count();
		$this->data['kelas'] = $this->Siswa->get_kelas();
	}

	public function index()
	{
		$this->load->view('interface/home', $this->data);
	}

	public function Kriteria()
	{
		$this->load->view('interface/kriteria',$this->data);
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
	public function Alternatif()
	{
		$this->load->view('interface/alternatif');
	}

	public function Nilai()
	{
		$this->load->view('interface/nilai');
	}

	public function Proses()
	{
		$this->load->view('interface/proses');
	}
}
