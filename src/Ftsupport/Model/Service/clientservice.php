<?php

namespace Ftsupport\Model\Service;
use Ftsupport\Model\Data\ClientDAO;
use Ftsupport\Model\Entities\Client;
use Ftsupport\Model\Service\ContactService;
/**
 * Description of clientservice
 *
 * @author cyber02
 */
class ClientService
{
    public static function showAll(){
        $result = array();
        $result['clients'] = ClientDAO::getAll();
        return $result;
    }
    public static function showDetail($arguments)
    {
        $result = array();
        $client = ClientDAO::getById($arguments[0]);
        $contacts = ContactService::showByClientid($arguments);
        $result['client'] = $client;
        $result['contacts'] = $contacts['contacts'];
        return $result;
    }
    
    public static function insert()
    {
        //check if POST vars are set
        if (isset($_POST['name'],
                    $_POST['address'],
                    $_POST['postcode'],
                    $_POST['city'],
                    $_POST['telephone'],
                    $_POST['fax'],
                    $_POST['email'],
                    $_POST['group'],
                    $_POST['remarks'])) {
            ClientDAO::create($_POST['name'],
                                $_POST['address'],
                                $_POST['postcode'],
                                $_POST['city'],
                                $_POST['telephone'],
                                $_POST['fax'],
                                $_POST['email'],
                                $_POST['group'],
                                $_POST['remarks']);
        }
    }
    
    public static function update()
    {
        if (isset($_POST['id'])) {
            //create client object from POST data
            $client = new Client($_POST['id'],
                    $_POST['name'],
                    $_POST['address'],
                    $_POST['postcode'],
                    $_POST['city'],
                    $_POST['telephone'],
                    $_POST['fax'],
                    $_POST['email'],
                    $_POST['group'],
                    $_POST['remarks']);
            //update client
            ClientDAO::update($client);
        }
    }
    
    public static function delete($arguments)
    {
         if (isset($arguments[0])) {
            ClientDAO::delete($arguments[0]);
         }
    }
}
