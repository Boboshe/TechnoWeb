<?php

/**
 * Created by PhpStorm.
 * User: Mohamed-Amine
 * Date: 29/01/2016
 * Time: 09:24
 */
class Incident
{
    //private $_id;
    private $_description;
    private $_type;
    private $_adresse;
    private $_severite;
    private $_reference;
    private $_imgURI;

    public function __construct($descr, $type, $adresse, $sev, $ref, $imgURI)
    {
        //$_id = $id;
        $_description = $descr;
        $_type = $type;
        $_adresse = $adresse;
        $_severite = $sev;
        $_reference = $ref;
        $_imgURI = $imgURI;
    }

    public function getDescription()
    {
        return $this->_description;
    }

    public function getType()
    {
        return $this->_type;
    }

    public function getAdresse()
    {
        return $this->_adresse;
    }

    public function getSeverite()
    {
        return $this->_severite;
    }

    public function getReference()
    {
        return $this->_reference;
    }

    public function getImgURI()
    {
        return $this->_imgURI;
    }


}