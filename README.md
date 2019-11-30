# Cekmutasi X CodeIgniter Framework
Development &amp; Integration Toolkit for CodeIgniter Framework (2.x+). For other web framework/language/plugin, please go to https://github.com/PT-Tridi/Cekmutasi.co.id

## Installation

- Copy folder **libraries/Cekmutasi** to your **application/libraries**
- Copy **cekmutasi.php** to your **application/config**
- Add your API Key & Signature in **application/config/cekmutasi.php**

## How To Use?

You can use cekmutasi library by loading Cekmutasi through CodeIgniter Library Loader as shown below:

<pre><code>$this->load->library("cekmutasi/cekmutasi");</code></pre>

it will load Cekmutasi library in CodeIgniter class instance so you can use like this:

<pre><code>$balance = $this->cekmutasi->balance();</code></pre>

Object data will return as data type of result

For further example, you can check out in TestCekmutasi.php included on this package

## Available Methods

* ### [balance()](libraries/Cekmutasi/Cekmutasi.php#L50)
	Get cekmutasi account balance

* ### [checkIP()](libraries/Cekmutasi/Cekmutasi.php#L45)
	Check your detected IP address. This IP should be added to Whitelist IP in your integration if you want to use HTTP Request method or some plugins
	
* ### [catchIPN()](libraries/Cekmutasi/Cekmutasi.php#L55)
	Handle callback/ipn data. This method is highly recommended for use because it has pre-build callback/ipn security verification
	
* ### [bank()](libraries/Cekmutasi/Cekmutasi.php#L25)
	Load Bank service. Below are the available methods from bank service
	- #### [list()](libraries/Cekmutasi/Services/Bank.php#L28)
		Get bank account list
		
	- #### [detail()](libraries/Cekmutasi/Services/Bank.php#L38)
		Get bank account detail
		
	- #### [balance()](libraries/Cekmutasi/Services/Bank.php#L33)
		Get total balance of registered bank accounts
		
	- #### [mutation()](libraries/Cekmutasi/Services/Bank.php#L21)
		Get bank mutation (max 1000)

* ### [paypal()](libraries/Cekmutasi/Cekmutasi.php#L30)
	Load PayPal service. Below are the available methods from paypal service
	- #### [list()](libraries/Cekmutasi/Services/PayPal.php#L44)
		Get paypal account list
		
	- #### [detail()](libraries/Cekmutasi/Services/PayPal.php#L70)
		Get paypal account detail
		
	- #### [balance()](libraries/Cekmutasi/Services/PayPal.php#L56)
		Get total balance of registered paypal accounts
		
	- #### [mutation()](libraries/Cekmutasi/Services/PayPal.php#L30)
		Get paypal mutation (max 1000)
	
* ### [gopay()](libraries/Cekmutasi/Cekmutasi.php#L35)
	Load GoPay service. Below are the available methods from gopay service
	- #### [list()](libraries/Cekmutasi/Services/GoPay.php#L28)
		Get gopay account list
		
	- #### [detail()](libraries/Cekmutasi/Services/GoPay.php#L38)
		Get gopay account detail
		
	- #### [balance()](libraries/Cekmutasi/Services/GoPay.php#L33)
		Get total balance of registered gopay accounts
		
	- #### [mutation()](libraries/Cekmutasi/Services/GoPay.php#L21)
		Get gopay mutation (max 1000)
	
* ### [ovo()](libraries/Cekmutasi/Cekmutasi.php#L40)
	Load OVO service. Below are the available methods from ovo service
	- #### [list()](libraries/Cekmutasi/Services/OVO.php#L28)
		Get ovo account list
		
	- #### [detail()](libraries/Cekmutasi/Services/OVO.php#L38)
		Get ovo account detail
		
	- #### [balance()](libraries/Cekmutasi/Services/OVO.php#L33)
		Get total balance of registered ovo accounts
		
	- #### [mutation()](libraries/Cekmutasi/Services/OVO.php#L21)
		Get ovo mutation (max 1000)
		
	- #### [transferBankList()](libraries/Cekmutasi/Services/OVO.php#L45)
		Get the available destination banks
	
	- #### [transferBankInquiry()](libraries/Cekmutasi/Services/OVO.php#L52)
		Make transfer bank inquiry
		
	- #### [transferBank()](libraries/Cekmutasi/Services/OVO.php#L61)
		Proccess transfer from OVO to bank
		
	- #### [transferBankDetail()](libraries/Cekmutasi/Services/OVO.php#L71)
		Get transaction detail of bank transfer
	
	- #### [transferOVOInquiry()](libraries/Cekmutasi/Services/OVO.php#L78)
		Make transfer OVO inquiry
		
	- #### [transferOVO()](libraries/Cekmutasi/Services/OVO.php#L86)
		Proccess transfer from OVO to OVO

## Security Advice

For the best way to handle Callback/IPN, we strongly recommend you to use the catchIPN() method with pre-build security validation to handle and verifiying incoming callback/ipn data.
