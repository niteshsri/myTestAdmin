<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $email
 * @property string $username
 * @property string $phone
 * @property string $password
 * @property bool $status
 * @property bool $is_verified
 * @property bool $is_approved
 * @property \Cake\I18n\Time $is_deleted
 * @property string $remark
 * @property int $approved_by
 * @property int $last_modified_by
 * @property string $uuid
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\BusinessBankDetail[] $business_bank_details
 * @property \App\Model\Entity\ResetPasswordHash[] $reset_password_hash
 * @property \App\Model\Entity\UserAddres[] $user_address
 * @property \App\Model\Entity\UserBusinessBasicDetail[] $user_business_basic_details
 * @property \App\Model\Entity\UserBusinessContactDetail[] $user_business_contact_details
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($value){
       $hasher = new DefaultPasswordHasher();
       return $hasher->hash($value);
   }

   protected function _getFullName()
   {
       return $this->_properties['first_name'] . '  ' .
       $this->_properties['last_name'];
   }
}
