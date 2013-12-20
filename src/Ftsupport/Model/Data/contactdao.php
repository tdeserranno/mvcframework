<?php
namespace Ftsupport\Model\Data;
use Ftsupport\Model\Entities\Contact;
/**
 * Description of contactdao
 *
 * @author Thomas
 */
class ContactDAO
{
    /**
     * Prepared statement used but not needed (since there is no risk of SQL injection)
     * for the sake of code integrity 
     * @return array
     */
    public static function getAll()
    {
        $result = array();
        $db = new \PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = 'SELECT * FROM contact';
        $statement = $db->prepare($sql);
        $statement->execute();
        $recordset = $statement->fetchAll();
        foreach ($recordset as $record) {
            $contact = new Contact(
                    $record['id'],
                    $record['name'],
                    $record['telephone'],
                    $record['mobile'],
                    $record['email'],
                    $record['clientid']);
            array_push($result, $contact);
        }
        unset($db);
        return $result;
    }
    
    public static function getById($id)
    {
        $db = new \PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = 'SELECT * FROM contact WHERE id = :id';
        $statement = $db->prepare($sql);
        $statement->execute(array(':id' => $id));
        $record = $statement->fetch();
        $contact = new Contact(
                    $record['id'],
                    $record['name'],
                    $record['telephone'],
                    $record['mobile'],
                    $record['email'],
                    $record['clientid']);
        unset($db);
        return $contact;
    }
    
    public static function getByClient($clientid)
    {
        $result = array();
        $db = new \PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = 'SELECT * FROM contact WHERE clientid = :clientid';
        $statement = $db->prepare($sql);
        $statement->execute(array(':clientid' => $clientid));
        $recordset = $statement->fetchAll();
        foreach ($recordset as $record) {
            $contact = new Contact(
                    $record['id'],
                    $record['name'],
                    $record['telephone'],
                    $record['mobile'],
                    $record['email'],
                    $record['clientid']);
            array_push($result, $contact);
        }
        unset($db);
        return $result;
    }
    
    public static function update($contact)
    {
        $db = new \PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = 'UPDATE contact SET';
        $sql .= ' name = :name,';
        $sql .= ' telephone = :telephone,';
        $sql .= ' mobile = :mobile,';
        $sql .= ' email = :email';
        $sql .= ' WHERE id = :id'; 
        $statement = $db->prepare($sql);
        $statement->execute(array(':name' => $contact->getName(),
                                    ':telephone' => $contact->getTelephone(),
                                    ':mobile' => $contact->getMobile(),
                                    ':email' => $contact->getEmail(),
                                    ':id' => $contact->getId()));
        unset($db);
    }
    
    public static function create($name, $telephone, $mobile, $email, $clientid)
    {
        $db = new \PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = 'INSERT INTO contact';
        $sql .= ' (name, telephone, mobile, email, clientid)';
        $sql .= ' VALUES (:name, :telephone, :mobile, :email, :clientid)';
        $statement = $db->prepare($sql);
        $statement->execute(array(':name' => $name,
                                    ':telephone' => $telephone,
                                    ':mobile' => $mobile,
                                    ':email' => $email,
                                    ':clientid' => $clientid));
        unset($db);
    }
    
    public static function delete($id)
    {
        $db = new \PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = 'DELETE FROM contact WHERE id = :id';
        $statement = $db->prepare($sql);
        $statement->execute(array(':id' => $id));
        unset($db);
    }
}
