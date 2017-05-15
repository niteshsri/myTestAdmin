<?php
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link      http://cakephp.org CakePHP(tm) Project
* @since     0.2.9
* @license   http://www.opensource.org/licenses/mit-license.php MIT License
*/
namespace App\Controller\Api;

/**
* Application Controller
*
* Add your application-wide methods in the class below, your controllers
* will inherit them.
*
* @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
*/
class ApiHelper
{

  /**
  * This method is used to check whether a key in an array is present or not and if present then it should
  * not be empty.
  * @param array $src cotains source array
  * @param string $key contains key to be verified
  *
  * @return Boolean returns ture if key presnt in src else false
  */
  public static function strictValidate($src,$key){
    if(isset($src[$key]) && !empty($src[$key])){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  /**
  * This method is used to verify if provided email is having correct syntax or not
  * @param string $email contains email to be verified
  *
  * @return Boolean returns ture if email syntax is correct else false
  */
  public static function isValidEmail($email){
    if($email){
      return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }else{
      return false;
    }
  }

  public static function generateCryptographicString( $type = 'alnum', $length = 8 )
  {
    switch ( $type ) {
      case 'alnum':
      $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      break;
      case 'alpha':
      $pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      break;
      case 'hexdec':
      $pool = '0123456789abcdef';
      break;
      case 'numeric':
      $pool = '0123456789';
      break;
      case 'nozero':
      $pool = '123456789';
      break;
      case 'distinct':
      $pool = '2345679ACDEFHJKLMNPRSTUVWXYZ';
      break;
      default:
      $pool = (string) $type;
      break;
    }


    $crypto_rand_secure = function ( $min, $max ) {
      $range = $max - $min;
      if ( $range < 0 ) return $min; // not so random...
      $log    = log( $range, 2 );
      $bytes  = (int) ( $log / 8 ) + 1; // length in bytes
      $bits   = (int) $log + 1; // length in bits
      $filter = (int) ( 1 << $bits ) - 1; // set all lower bits to 1
      do {
        $rnd = hexdec( bin2hex( openssl_random_pseudo_bytes( $bytes ) ) );
        $rnd = $rnd & $filter; // discard irrelevant bits
      } while ( $rnd >= $range );
      return $min + $rnd;
    };

    $token = "";
    $max   = strlen( $pool );
    for ( $i = 0; $i < $length; $i++ ) {
      $token .= $pool[$crypto_rand_secure( 0, $max )];
    }
    return $token;
  }
}
