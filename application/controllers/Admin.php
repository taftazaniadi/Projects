<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Admin', 'Admin');
	}

	public function index()
	{
		$this->load->view('interface/home');
	}

	public function Kriteria()
	{
		$this->load->view('interface/kriteria');
	}

	public function Parameter()
	{
		$this->load->view('interface/parameter');
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
