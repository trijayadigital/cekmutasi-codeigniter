<?php

defined("BASEPATH") or exit("No direct script access allowed");

require_once(__DIR__.'/Container.php');
require_once(__DIR__.'/Services/Bank.php');
require_once(__DIR__.'/Services/PayPal.php');
require_once(__DIR__.'/Services/OVO.php');
require_once(__DIR__.'/Services/GoPay.php');
require_once(__DIR__.'/Support/Constant.php');

use Cekmutasi\Support\Constant;
use Cekmutasi\Services\Bank;
use Cekmutasi\Services\PayPal;
use Cekmutasi\Services\GoPay;
use Cekmutasi\Services\OVO;

class Cekmutasi extends Container
{
	public function __construct()
	{
		parent::__construct();

		// incluce CodeIgniter class instance,
		// you can use it to load any model, libraries, and all of CodeIgniter parts
		// ex: $this->CI->load->model('ModelName');

		$this->CI =& get_instance();
	}

    /**
    *   Load bank service
    *
    *   @param Array $configs
    *
    *   @return Object Cekmutasi\Services\Bank
    *
    **/

    public function bank($configs = [])
    {
        return (new Bank($configs));
    }

    /**
    *   Load PayPal service
    *
    *   @param Array $configs
    *
    *   @return Object Cekmutasi\Services\PayPal
    *
    **/

	public function paypal($configs = [])
    {
        return (new PayPal($configs));
    }

    /**
    *   Load GoPay service
    *
    *   @param Array $configs
    *
    *   @return Object Cekmutasi\Services\GoPay
    *
    **/

	public function gopay($configs = [])
    {
    	return (new GoPay($configs));
    }

    /**
    *   Load OVO service
    *
    *   @param Array $configs
    *
    *   @return Object Cekmutasi\Services\OVO
    *
    **/

	public function ovo($configs = [])
    {
    	return (new OVO($configs));
    }

    /**
    *   Check your IP
    *
    *   @return Object Container::curl()
    *
    **/

	public function checkIP()
    {
    	return $this->curl('/myip', Constant::HTTP_POST);
    }

    /**
    *   Check your cekmutasi balance
    *
    *   @return Object Container::curl()
    *
    **/

	public function balance()
    {
    	return $this->curl('/balance', Constant::HTTP_POST);
    }

    /**
    *   Handle incoming IPN/Callback data
    *
    *   @return Object
    *
    **/

	public function catchIPN()
    {
        $incomingSignature = $this->CI->input->server('HTTP_API_SIGNATURE') ?: '';

        if( empty($incomingSignature) ) {
            log_message('info', get_class($this).': Undefined Signature');
            exit("Undefined signature!");
        }

        if( version_compare(PHP_VERSION, '5.6.0', '>=') )
        {
            if( !hash_equals($this->apiSignature, $incomingSignature) ) {
                log_message('info', get_class($this).': Invalid Signature, ' . $this->apiSignature . ' vs ' . $incomingSignature);
                exit("Invalid signature!");
            }
        }
        else
        {
            if( $this->apiSignature !== $incomingSignature ) {
                log_message('info', get_class($this).': Invalid Signature, ' . $this->apiSignature . ' vs ' . $incomingSignature);
                exit("Invalid signature!");
            }
        }

        $json = $this->CI->security->xss_clean($this->CI->input->raw_input_stream);
        $decoded = json_decode($json);

        if( json_last_error() !== JSON_ERROR_NONE ) {
            log_message('info', get_class($this).': Invalid JSON, ' . $json);
            exit("Invalid JSON!");
        }

        return $decoded;
    }
}
