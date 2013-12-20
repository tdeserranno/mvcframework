<?php

namespace Ftsupport\Model\Service;
use Ftsupport\Model\Data\UserDAO;
/**
 * Description of userservice
 *
 * @author cyber02
 */
class UserService
{
    public static function validateUser($username, $password)
    {
        //hash POSTed password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        //retrieve user from DB
        $user = UserDAO::getUser($username);
        //verify password
        if (password_verify($password, $user->getHashedPassword())) {
            return true;
        } else {
            throw new \Exception('password incorrect');
        }
    }
}
