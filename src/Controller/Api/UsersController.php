<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController as ApiController;
use App\Controller\Api\ApiHelper;
use Cake\Utility\Security;
use Firebase\JWT\JWT;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\UnauthorizedException;
use Cake\Network\Exception\ConflictException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Network\Exception\NotFoundException;
use Cake\Collection\Collection;
use Cake\I18n\Time;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Core\Configure;
use Cake\Log\Log;

/**
* Users Controller
*
* @property \App\Model\Table\UsersTable $Users
*/
class UsersController extends ApiController
{

  const USER_LABEL='user';

  public function initialize()
  {
    // parent::initialize();
    $this->loadComponent('RequestHandler');
    $this->Auth->allow(['index']);
  }

  public function index()
  {
    if (!$this->request->is(['get'])) {
      throw new MethodNotAllowedException(__('BAD_REQUEST'));
    }
  }
}
