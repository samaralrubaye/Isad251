<?php


class request
{
    private $Fname;
    private $Lname;
    private $Uemail;

    public function __construct($Fname, $Lname,$Uemail)
    {
        $this->UserFirstNamr = $Fname;
        $this->UserLastName = $Lname;
        $this->UserEmail=$Uemail;

    }
    public function UserFirstName($Fname)
    {
        return $this->$Fname;
    }
    public function UserLastName()
    {
        $this-> $Lname;
    }
    public function UserEmail()
    {
        return $this->Uemail;
    }
   }