<?php


class requestCustomer
{
    private $UserFirstName;
    private $UserLastName;
    private  $UserEmail;
    public function __construct( $UserFirstName,$UserLastName,$UserEmail){
        $this->UserFirstName=$UserFirstName;
        $this->UserLastName=$UserLastName;
        $this->UserEmail=$UserEmail;

    }
    public function UserFirstName()
    {
        return $this->UserFirstName;
    }
    public function UserLastName()
    {
        return $this->UserLastName;
    }
    public function UserEmail()
    {
        return $this->UserEmail;
    }

}