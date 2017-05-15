<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserBusinessContactDetail Entity
 *
 * @property int $id
 * @property int $user_business_basic_detail_id
 * @property int $user_id
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $country
 * @property string $zip
 * @property bool $status
 * @property bool $is_approved
 * @property \Cake\I18n\Time $is_deleted
 * @property string $remark
 * @property int $approved_by
 * @property int $last_modified_by
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\UserBusinessBasicDetail $user_business_basic_detail
 * @property \App\Model\Entity\User $user
 */
class UserBusinessContactDetail extends Entity
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
}
