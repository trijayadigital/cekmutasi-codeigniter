<?php

defined("BASEPATH") or exit("No direct script access allowed");

require_once(__DIR__.'/Support/Constant.php');

class Container
{
	protected $apiKey;
	protected $apiSignature;

    public function __construct()
    {
        $this->CI =& get_instance();

        $this->CI->config->load('cekmutasi');

        $this->apiKey = $this->CI->config->item('api_key', 'cekmutasi');
        $this->apiSignature = $this->CI->config->item('api_signature', 'cekmutasi');
    }

	protected function curl($endpoint, $method = \Cekmutasi\Support\Constant::HTTP_GET, $params = [])
    {
    	$url = \Cekmutasi\Support\Constant::API_BASEURL . '/'.ltrim($endpoint, '/');

    	$ch = curl_init();

    	if( $method == \Cekmutasi\Support\Constant::HTTP_GET )
    	{
    		$url .= '?'.http_build_query($params);
    	}
    	else
    	{
    		curl_setopt($ch, CURLOPT_POST, true);
    		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    	}

        curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            	'Api-Key: ' . $this->apiKey,
            	'Accept: ' . \Cekmutasi\Support\Constant::FORMAT_JSON,
                'User-Agent: Cekmutasi CodeIgniter/' . \Cekmutasi\Support\Constant::VERSION
            ]);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 180);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $errno = curl_errno($ch);
        $error = curl_error($ch);

        curl_close($ch);

        if( $errno )
        {
            $result = json_encode([
                'success'     	=> false,
                'error_message'	=> $error
            ]);
        }

        return json_decode($result);
    }
}

?>