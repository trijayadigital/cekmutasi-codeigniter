<?php

defined("BASEPATH") or exit("No direct script access allowed");

require_once(__DIR__.'/Container.php');
require_once(__DIR__.'/Services/Bank.php');
require_once(__DIR__.'/Services/PayPal.php');
require_once(__DIR__.'/Services/OVO.php');
require_once(__DIR__.'/Services/GoPay.php');
require_once(__DIR__.'/Support/Constant.php');

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

    public function bank($configs = [])
    {
        return (new \Cekmutasi\Services\Bank($configs));
    }

	public function paypal($configs = [])
    {
        return (new \Cekmutasi\Services\PayPal($configs));
    }

	public function gopay($configs = [])
    {
    	return (new \Cekmutasi\Services\GoPay($configs));
    }

	public function ovo($configs = [])
    {
    	return (new \Cekmutasi\Services\OVO($configs));
    }

	public function checkIP()
    {
    	return $this->curl('/myip', \Cekmutasi\Support\Constant::HTTP_POST);
    }

	public function balance()
    {
    	return $this->curl('/balance', \Cekmutasi\Support\Constant::HTTP_POST);
    }

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
            if( $this->apiSignature != $incomingSignature ) {
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
