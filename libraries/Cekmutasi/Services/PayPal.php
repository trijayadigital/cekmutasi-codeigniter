<?php

defined("BASEPATH") or exit("No direct script access allowed");

namespace Cekmutasi\Services;

require_once(dirname(__DIR__).'/Container.php');
require_once(dirname(__DIR__).'/Support/Constant.php');

class PayPal extends \Container
{
	private $config = [];

	public function __construct($configs = [])
	{
		parent::__construct();

		$this->config = $configs;
	}

	/**
	*	Get PayPal mutation (max 1000)
	*
	*	@param Array Search Filter $filters
	*
	*	@return Object Container::curl()
	*
	**/

	public function mutation($filters = [])
	{
		return $this->curl('/paypal/search', \Cekmutasi\Support\Constant::HTTP_POST, [
			'search'	=> $filters
		]);
	}

	/**
	*	Get all registered paypal accounts
	*
	*	@return Object Container::curl()
	*
	**/

	public function list()
	{
		return $this->curl('/paypal/list', \Cekmutasi\Support\Constant::HTTP_POST);
	}

	/**
	*	Get total balance of registered paypal accounts
	*
	*	@return Object Container::curl()
	*
	**/

	public function balance()
	{
		return $this->curl('/paypal/balance', \Cekmutasi\Support\Constant::HTTP_POST);
	}

	/**
	*	Get paypal account detail
	*
	*	@param Int PayPal ID $id
	*
	*	@return Object Container::curl()
	*
	**/

	public function detail(int $id)
	{
		return $this->curl('/paypal/detail', \Cekmutasi\Support\Constant::HTTP_POST, [
			'id'	=> intval($id)
		]);
	}

	/**
	*	Get transaction detail
	*
	*	@param String $username
	*
	*	@param String $transactionid
	*
	*	@return Object Container::curl()
	*
	**/

	public function trxDetail($username, $transactionid)
	{
		return $this->curl('/paypal/transaction/detail', \Cekmutasi\Support\Constant::HTTP_POST, [
			'username'	=> $username,
			'transactionid' => $transactionid
		]);
	}
}