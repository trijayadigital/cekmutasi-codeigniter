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

	/**
	*	Get GoPay mutation (max 1000)
	*
	*	@param Array Search Filter $filters
	*
	*	@return Object Container::curl()
	*
	**/

	public function mutation($filters = [])
	{
		return $this->curl('/gopay/search', \Cekmutasi\Support\Constant::HTTP_POST, [
			'search'	=> $filters
		]);
	}

	/**
	*	Get all registered gopay accounts
	*
	*	@return Object Container::curl()
	*
	**/

	public function list()
	{
		return $this->curl('/gopay/list', \Cekmutasi\Support\Constant::HTTP_POST);
	}

	/**
	*	Get total balance of registered gopay accounts
	*
	*	@return Object Container::curl()
	*
	**/

	public function balance()
	{
		return $this->curl('/gopay/balance', \Cekmutasi\Support\Constant::HTTP_POST);
	}

	/**
	*	Get gopay account detail
	*
	*	@param Int GoPay ID $id
	*
	*	@return Object Container::curl()
	*
	**/

	public function detail(int $id)
	{
		return $this->curl('/gopay/detail', \Cekmutasi\Support\Constant::HTTP_POST, [
			'id'	=> intval($id)
		]);
	}
}