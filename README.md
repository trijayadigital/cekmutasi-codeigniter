# Cekmutasi X CodeIgniter Framework

Development &amp; Integration Toolkit for CodeIgniter Framework (2.x+). For other web framework/language/plugin, please go to https://github.com/trijayadigital/cekmutasi

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

* ### balance()
	Get cekmutasi account balance

* ### checkIP()
	Check your detected IP address. This IP should be added to Whitelist IP in your integration if you want to use HTTP Request method or some plugins
	
* ### catchIPN()
	Handle callback/ipn data. This method is highly recommended for use because it has pre-build callback/ipn security verification
	
* ### bank()
	Load Bank service. Below are the available methods from bank service
	- #### list()
		Get bank account list
		
	- #### detail()
		Get bank account detail
		
	- #### balance()
		Get total balance of registered bank accounts
		
	- #### mutation()
		Get bank mutation (max 1000)

* ### paypal()
	Load PayPal service. Below are the available methods from paypal service
	- #### list()
		Get paypal account list
		
	- #### detail()
		Get paypal account detail
		
	- #### balance()
		Get total balance of registered paypal accounts
		
	- #### mutation()
		Get paypal mutation (max 1000)
	
* ### gopay()
	Load GoPay service. Below are the available methods from gopay service
	- #### list()
		Get gopay account list
		
	- #### detail()
		Get gopay account detail
		
	- #### balance()
		Get total balance of registered gopay accounts
		
	- #### mutation()
		Get gopay mutation (max 1000)
	
* ### ovo()
	Load OVO service. Below are the available methods from ovo service
	- #### list()
		Get ovo account list
		
	- #### detail()
		Get ovo account detail
		
	- #### balance()
		Get total balance of registered ovo accounts
		
	- #### mutation()
		Get ovo mutation (max 1000)
		
	- #### transferBankList()
		Get the available destination banks
	
	- #### transferBankInquiry()
		Make transfer bank inquiry
		
	- #### transferBank()
		Proccess transfer from OVO to bank
		
	- #### transferBankDetail()
		Get transaction detail of bank transfer
	
	- #### transferOVOInquiry()
		Make transfer OVO inquiry
		
	- #### transferOVO()
		Proccess transfer from OVO to OVO

## Security Advice

For the best way to handle Callback/IPN, we strongly recommend you to use the catchIPN() method with pre-build security validation to handle and verifiying incoming callback/ipn data.
