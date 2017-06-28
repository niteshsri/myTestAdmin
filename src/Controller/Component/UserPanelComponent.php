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

class UserPanelComponent extends Component{

	/**
     * reseller Connect method
     * This method hits BuzzyDoc and get the vendors points. Request body is created using the vendor data received.
     *
     * @param  Entity $vendorData Vendor Entity contains coressponding User Entity to be created.
     * @return ....
     * @author Nikhil Verma
     */

	public function ViewMerchants()
	{
		// $token = $this->request->header('Authorization');
		// $token = str_replace('Bearer ', '', $token);
		// $decodeToken = JWT::decode($token, Security::salt(), array('HS256'));
		$http = new Client(['headers' => ['Content-Type' => 'application/json','accept'=>'application/json']]);
		//get response
		// $data = $redeemedPointData;
		// $data['mode']=$decodeToken->application_mode;
		// $data['env']=$decodeToken->application_env;
		$response = $http->get( 'http://localhost/api/Users/');
		if($response->isOk()){
			$response = json_decode($response->body());
			return $response->response->data->response;
		}else{
			return FALSE;
		}
	}

}
?>
