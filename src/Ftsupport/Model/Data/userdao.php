<?php
namespace Ftsupport\Model\Data;
use Ftsupport\Model\Entities\User;
/**
 * Description of userdao
 *
 * @author cyber02
 */
class UserDAO
{
    public static function getUser($username)
    {
        //create DB connection
        $db = new \PDO(DB_DSN, DB_USER, DB_PASS);
        //prepare statement
        $sql = 'SELECT * FROM user WHERE username = :username';    
        $statement = $db->prepare($sql);
        //test if statement can be executed
        if ($statement->execute(array(':username' => $username))) {
            //test if statement retrieved something
            $record = $statement->fetch();
            if (!empty($record)) {
                //create user object and return it
                $user = new User($record['username'], $record['password']);
                return $user;
            } else {
                //no matching record
                throw new \Exception('no matching user found');
            }
        }else {
            //statement could not be executed
            throw new \Exception('statement could not be executed');
        }
    }
}
