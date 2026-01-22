<?php

class User {
    public $name;
    public $email;
    public $registrationDate;

public function __construct($name, $email, $registrationDate) {
        $this->name = $name;
        $this->email = $email;
        $this->registrationDate = $registrationDate;
    }
}