<?php

class TestCekmutasi extends CI_Controller
{
	public function mutasiBank()
	{
		$this->load->library('cekmutasi/cekmutasi');

		$mutasi = $this->cekmutasi->bank()->mutation([
			'date'		=> [
				'from'	=> date('Y-m-d') . ' 00:00:00',
				'to'	=> date('Y-m-d') . ' 23:59:59'
			]
		]);

		print_r($mutasi);
	}

	public function mutasiPayPal()
	{
		$this->load->library('cekmutasi/cekmutasi');

		$mutasi = $this->cekmutasi->paypal()->mutation([
			'date'		=> [
				'from'	=> date('Y-m-d') . ' 00:00:00',
				'to'	=> date('Y-m-d') . ' 23:59:59'
			]
		]);

		print_r($mutasi);
	}

	public function mutasiOVO()
	{
		$this->load->library('cekmutasi/cekmutasi');

		$mutasi = $this->cekmutasi->ovo()->mutation([
			'date'		=> [
				'from'	=> date('Y-m-d') . ' 00:00:00',
				'to'	=> date('Y-m-d') . ' 23:59:59'
			]
		]);

		print_r($mutasi);
	}

	public function mutasiGoPay()
	{
		$this->load->library('cekmutasi/cekmutasi');

		$mutasi = $this->cekmutasi->gopay()->mutation([
			'date'		=> [
				'from'	=> date('Y-m-d') . ' 00:00:00',
				'to'	=> date('Y-m-d') . ' 23:59:59'
			]
		]);

		print_r($mutasi);
	}

	public function balance()
	{
		$this->load->library('cekmutasi/cekmutasi');

		$balance = $this->cekmutasi->balance();

		print_r($balance);
	}

	public function handleCallback()
	{
		$this->load->library('cekmutasi/cekmutasi');

		$ipn = $this->cekmutasi->catchIPN();

		print_r($ipn);
	}
}