<?php
namespace App\Helpers;
use App\Models\UserQuickBook;
use Auth;

class QuickBook
{
	public function saveCustomerToQuickBook($data)
	{
		$quickbook = UserQuickBook::where('user_id', '=' , Auth::user()->id)
            ->first();
        if($quickbook)
        {
			require_once(public_path('v3-php-sdk-2.2.0-RC/config.php'));  // Default V3 PHP SDK (v2.0.1) from IPP
		    require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
		    require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
		    require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
		    require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
		    error_reporting(E_ERROR | E_PARSE);
		    try {
				$requestValidator = new \OAuthRequestValidator(
			    $quickbook->oauth_token, $quickbook->oauth_token_secret, 
			    $quickbook->consumer_key, $quickbook->consumer_key_secret);
			    $realmId = $quickbook->company_id;

			    $serviceType = 'QBO';
			    $serviceContext = new \ServiceContext($realmId, $serviceType, $requestValidator);
			  
			    $dataService = new \DataService($serviceContext);

			    //Customer Obj
			    $customer = new \IPPCustomer();
			    $customer->GivenName = $data['first_name'];
			    $customer->FamilyName = $data['last_name'];
			    $customer->DisplayName = $data['first_name']." ".$data['last_name'];
			    // Primary Phone
			    $telephone = new \IPPTelephoneNumber();
			    $telephone->FreeFormNumber = $data['phone'];
			    $customer->PrimaryPhone = $telephone;

			    // Alternate Phone
			    if(isset($data['alternative_phone']) && !empty($data['alternative_phone']))
			    {
				    $alternate_telephone = new \IPPTelephoneNumber();
				    $alternate_telephone->FreeFormNumber = $data['alternative_phone'];
				    $customer->AlternatePhone = $alternate_telephone;
			    }

			    // Email
			    if(isset($data['email']) && !empty($data['email']))
			    {
			    	$email = new \IPPEmailAddress();
			    	$email->Address = $data['email'];
			    	$customer->PrimaryEmailAddr = $email;
			    }

			    // Address
			    $address = new \IPPPhysicalAddress();
			    $address->Line1 = $data['address1'];
			    $address->City = $data['city'];
			    $address->PostalCode = $data['zip'];
			    $address->CountrySubDivisionCode = $data['state'];
			    $customer->BillAddr = $address;

			    $customer = $dataService->add($customer);
			    return true;
			}catch(Exception $e)
			{
				return false;
			}
		}

		return false;
	}
}