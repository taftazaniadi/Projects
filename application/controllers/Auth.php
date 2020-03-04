<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		$this->load->view('login');
	}

	public function Proces()
	{
		$post = $this->input->post(null, TRUE);

		if (isset($_POST['login']))
		{
			$this->load->model('M_Auth', 'Auth');

			$query = $this->Auth->login($post);

			if ($query->num_rows() > 0)
			{
				$row = $query->row();
				$params = array(
					'ID' => $row->ID,
					'Username' => $row->Username,
					'Password' => $row->Password,
					'Nama' => $row->Nama,
					'Level' => $row->Level
				);

				$this->session->set_userdata($params);

				$level = $row->Level;

				if ($level == 1)
				{
					$this->session->set_flashdata('Auth', $params['Nama']);
					echo "<script>window.location='". base_url('Admin') ."'</script>";
				}
				else
				{
					$this->session->set_flashdata('Auth', 'Username/Password tidak diketahui');
					// echo "<script>alert('Silahkan login lagi')</script>";
				}
			}
			else 
			{
				$this->session->set_flashdata('Auth', 'Gagal');
				echo "<script>document.location.href='". base_url('Auth') ."'</script>";
			}
		}
	}

	public function logout()
	{
		$params = array('ID');

		$this->session->unset_userdata($params);

		redirect(base_url('Auth'));
	}
}
