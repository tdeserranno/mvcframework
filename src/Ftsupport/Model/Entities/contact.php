<?php
namespace Ftsupport\Model\Entities;
use Library\Model;
/**
 * Description of contact
 *
 * @author Thomas
 */
class Contact extends Model
{
    private $id;
    private $name;
    private $telephone;
    private $mobile;
    private $email;
    private $clientid;
    
    function __construct($id, $name, $telephone, $mobile, $email, $clientid)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->telephone = $telephone;
        $this->mobile = $mobile;
        $this->email = $email;
        $this->clientid = $clientid;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getMobile()
    {
        return $this->mobile;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getClientid()
    {
        return $this->clientid;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setClientid($clientid)
    {
        $this->clientid = $clientid;
    }
}
