<?php

defined("BASEPATH") or exit("No direct script access allowed");

namespace Cekmutasi\Services;

require_once(dirname(__DIR__).'/Container.php');
require_once(dirname(__DIR__).'/Support/Constant.php');

class GoPay extends \Container
{
	private $config = [];

	public function __construct($configs = [])
	{
		parent::__construct();

		$this->config = $configs;
	}

	public function mutation($filters = [])
	{
		return $this->curl('/gopay/search', \Cekmutasi\Support\Constant::HTTP_POST, [
			'search'	=> $filters
		]);
	}

	public function list()
	{
		return $this->curl('/gopay/list', \Cekmutasi\Support\Constant::HTTP_POST);
	}

	public function balance()
	{
		return $this->curl('/gopay/balance', \Cekmutasi\Support\Constant::HTTP_POST);
	}

	public function detail(int $id)
	{
		return $this->curl('/gopay/detail', \Cekmutasi\Support\Constant::HTTP_POST, [
			'id'	=> intval($id)
		]);
	}
}