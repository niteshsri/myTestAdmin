<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Http\Client;
use Cake\Network\Session;
use Cake\Network\Exception\BadRequestException;
use Cake\Log\Log;
use Cake\Core\Configure;
use Firebase\JWT\JWT;
use Cake\Utility\Security;

class MerchantPanelComponent extends Component{

	/**
     * reseller Connect method
     * This method hits BuzzyDoc and get the vendors points. Request body is created using the vendor data received.
     *
     * @param  Entity $vendorData Vendor Entity contains coressponding User Entity to be created.
     * @return ....
     * @author Nikhil Verma
     */

	public function ViewAllMerchants($payload = false)
	{
		$http = new Client(['headers' => ['Content-Type' => 'application/json','accept'=>'application/json']]);
		if($payload && !is_array($payload)){
			return  (object)['status'=>false,'error'=>'Incorrect data provided'];
		}elseif($payload && is_array($payload)){
			$payload = '?'.http_build_query($payload);
		}
		$response = $http->get( 'http://localhost/myTestCode/merchant_api/Users/'.$payload);
		if($response->isOk()){
			return json_decode($response->body());
		}else{
			return FALSE;
		}
	}
	public function ViewMerchantInfo($id)
	{
		$http = new Client(['headers' => ['Content-Type' => 'application/json','accept'=>'application/json']]);
		$response = $http->get( 'http://localhost/myTestCode/merchant_api/Users/'.$id);
		if($response->isOk()){
			return json_decode($response->body());
		}else{
			return FALSE;
		}
	}

}
?>
