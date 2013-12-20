<?php
namespace Ftsupport\Model\Entities;
use Library\Model;
/**
 * Description of user
 *
 * @author cyber02
 */
class User extends Model
{
    private $username;
    private $hashedPassword;
    
    function __construct($username, $hashedPassword)
    {
        parent::__construct();
        $this->username = $username;
        $this->hashedPassword = $hashedPassword;
    }
    
    public function getUsername()
    {
        return $this->username;
    }

    public function getHashedPassword()
    {
        return $this->hashedPassword;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setHashedPassword($hashedPassword)
    {
        $this->hashedPassword = $hashedPassword;
    }
}
