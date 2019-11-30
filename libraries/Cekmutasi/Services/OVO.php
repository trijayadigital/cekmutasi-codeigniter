<?php

defined("BASEPATH") or exit("No direct script access allowed");

namespace Cekmutasi\Services;

require_once(dirname(__DIR__).'/Container.php');
require_once(dirname(__DIR__).'/Support/Constant.php');

class OVO extends \Container
{
	private $config = [];

	public function __construct($configs = [])
	{
		parent::__construct();

		$this->config = $configs;
	}

	public function mutation($filters = [])
	{
		return $this->curl('/ovo/search', \Cekmutasi\Support\Constant::HTTP_POST, [
			'search'	=> $filters
		]);
	}

	public function list()
	{
		return $this->curl('/ovo/list', \Cekmutasi\Support\Constant::HTTP_POST);
	}

	public function balance()
	{
		return $this->curl('/ovo/balance', \Cekmutasi\Support\Constant::HTTP_POST);
	}

	public function detail(int $id)
	{
		return $this->curl('/ovo/detail', \Cekmutasi\Support\Constant::HTTP_POST, [
			'id'	=> intval($id)
		]);
	}

	public function transferBankList($sourceNumber)
	{
		return $this->curl('/ovo/transfer/bank-list', \Cekmutasi\Support\Constant::HTTP_POST, [
			'source_number'	=> $sourceNumber
		]);
	}

	public function transferBankInquiry($sourceNumber, $bankCode, $destinationNumber)
	{
		return $this->curl('/ovo/transfer/inquiry', \Cekmutasi\Support\Constant::HTTP_POST, [
			'source_number'	=> $sourceNumber,
			'bank_code'	=> $bankCode,
			'destination_number'	=> $destinationNumber
		]);
	}

	public function transferBank($uuid, $token, $amount, $note = '')
	{
		return $this->curl('/ovo/transfer/send', \Cekmutasi\Support\Constant::HTTP_POST, [
			'uuid'	=> $uuid,
			'token'	=> $token,
			'amount'	=> $amount,
			'note'	=> $note
		]);
	}

	public function transferBankDetail($uuid)
	{
		return $this->curl('/ovo/transfer/detail', \Cekmutasi\Support\Constant::HTTP_GET, [
			'uuid'	=> $uuid
		]);
	}

	public function transferOVOInquiry($sourceNumber, $destinationNumber)
	{
		return $this->curl('/ovo/transfer/send', \Cekmutasi\Support\Constant::HTTP_POST, [
			'source_number'	=> $sourceNumber,
			'phone'	=> $destinationNumber
		]);
	}

	public function transferOVO($sourceNumber, $destinationNumber, $amount)
	{
		return $this->curl('/ovo/transfer/send', \Cekmutasi\Support\Constant::HTTP_POST, [
			'source_number'	=> $sourceNumber,
			'phone'	=> $destinationNumber,
			'amount'	=> $amount
		]);
	}
}