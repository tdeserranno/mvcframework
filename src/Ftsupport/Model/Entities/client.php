<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Ftsupport\Model\Entities;
use Library\Model;
/**
 * Description of client
 *
 * @author Thomas
 */
class Client extends Model
{
    private $id;
    private $name;
    private $address;
    private $postcode;
    private $city;
    private $telephone;
    private $fax;
    private $email;
    private $group;
    private $remarks;
    
    function __construct($id, $name, $address, $postcode, $city, $telephone, $fax, $email, $group, $remarks)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->postcode = $postcode;
        $this->city = $city;
        $this->telephone = $telephone;
        $this->fax = $fax;
        $this->email = $email;
        $this->group = $group;
        $this->remarks = $remarks;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getTelephone()
    {
        return $this->telephone;
    }

    public function getFax()
    {
        return $this->fax;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getGroup()
    {
        return $this->group;
    }

    public function getRemarks()
    {
        return $this->remarks;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setGroup($group)
    {
        $this->group = $group;
    }

    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;
    }
}
