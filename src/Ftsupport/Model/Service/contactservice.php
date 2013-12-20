<?php

namespace Ftsupport\Model\Service;
use Ftsupport\Model\Data\ContactDAO;
use Ftsupport\Model\Entities\Contact;

/**
 * Description of contactservice
 *
 * @author cyber02
 */
class ContactService
{
    public static function showByClientid($arguments)
    {
        $result = array();
        $result['contacts'] = ContactDAO::getByClient($arguments[0]);
        return $result;
    }
    
    public static function showDetail($arguments)
    {
        $result = array();
        $result['contact'] = ContactDAO::getById($arguments[0]);
        return $result;
    }
    
    public static function insert()
    {
        //check if POST vars are set
        if (isset($_POST['name'],                            
                            $_POST['telephone'],
                            $_POST['mobile'],
                            $_POST['email'],
                            $_POST['clientid'])) {
            ContactDAO::create($_POST['name'],                            
                            $_POST['telephone'],
                            $_POST['mobile'],
                            $_POST['email'],
                            $_POST['clientid']);
                            }
    }
    
    public static function update()
    {
        if (isset($_POST['id'])) {
            //create client object from POST data
            $contact = new Contact($_POST['id'],
                    $_POST['name'],
                    $_POST['telephone'],
                    $_POST['mobile'],
                    $_POST['email'],
                    $_POST['clientid']);
            //update client
            ContactDAO::update($contact);
        }
    }
    
    public static function delete($arguments)
    {
        if (isset($arguments[0])) {
            ContactDAO::delete($arguments[0]);
        }
    }
}
