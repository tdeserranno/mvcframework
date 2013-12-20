<?php

namespace Ftsupport\Model\Data;
use Ftsupport\Model\Entities\Client;
/**
 * Description of clientdao
 *
 * @author Thomas
 */
class ClientDAO
{
    public static function getAll()
    {
        /**
        * Prepared statement used but not needed (since there is no risk of SQL injection)
        * for the sake of code integrity 
        * @return array
        */
        $result = array();
        $db = new \PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = 'SELECT * FROM client';
        $statement = $db->prepare($sql);
        $statement->execute();
        $recordset = $statement->fetchAll();
        foreach ($recordset as $record) {
            $client = new Client(
                    $record['id'],
                    $record['name'],
                    $record['address'],
                    $record['postcode'],
                    $record['city'],
                    $record['telephone'],
                    $record['fax'],
                    $record['email'],
                    $record['grp'],
                    $record['remarks']);
            array_push($result, $client);
        }
        unset($db);
        return $result;
    }
    
    public static function getById($id)
    {
       $db = new \PDO(DB_DSN, DB_USER, DB_PASS);
       $sql = 'SELECT * FROM client WHERE id = :id';
       $statement = $db->prepare($sql);
       $statement->execute(array(':id' => $id));
       $record = $statement->fetch();
       $client = new Client(
                    $record['id'],
                    $record['name'],
                    $record['address'],
                    $record['postcode'],
                    $record['city'],
                    $record['telephone'],
                    $record['fax'],
                    $record['email'],
                    $record['grp'],
                    $record['remarks']);
       unset($db);
       return $client;
    }
    
    public static function create($name, $address, $postcode, $city, $telephone, $fax, $email, $group, $remarks)
    {
        $db = new \PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = 'INSERT INTO client';
        $sql .= ' (name, address, postcode, city, telephone, fax, email, grp, remarks)';
        $sql .= ' VALUES (:name, :address, :postcode, :city, :telephone, :fax, :email, :grp, :remarks)';
        $statement = $db->prepare($sql);
        $statement->execute(array(':name' => $name,
                                    ':address' => $address,
                                    ':postcode' => $postcode,
                                    ':city' => $city,
                                    ':telephone' => $telephone,
                                    ':fax' => $fax,
                                    ':email' => $email,
                                    ':grp' => $group,
                                    ':remarks' => $remarks));
        unset($db);
    }
    
    public static function update($client)
    {
        $db = new \PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = 'UPDATE client SET';
        $sql .= ' name = :name,';
        $sql .= ' address = :address,';
        $sql .= ' postcode = :postcode,';
        $sql .= ' city = :city,';
        $sql .= ' telephone = :telephone,';
        $sql .= ' fax = :fax,';
        $sql .= ' email = :email,';
        $sql .= ' grp = :grp,';
        $sql .= ' remarks = :remarks';
        $sql .= ' WHERE id = :id';
        $statement = $db->prepare($sql);
        $statement->execute(array(':name' => $client->getName(),
                                ':address' => $client->getAddress(),
                                ':postcode' => $client->getPostcode(),
                                ':city' => $client->getCity(),
                                ':telephone' => $client->getTelephone(),
                                ':fax' => $client->getFax(),
                                ':email' => $client->getEmail(),
                                ':grp' => $client->getGroup(),
                                ':remarks' => $client->getRemarks(),
                                ':id' => $client->getId()));
        unset($db);
    }
    
    public static function delete($id)
    {
        $db = new \PDO(DB_DSN, DB_USER, DB_PASS);
        $sql = 'DELETE FROM client WHERE id = :id';
        $statement = $db->prepare($sql);
        $statement->execute(array(':id' => $id));
        unset($db);
    }
}
