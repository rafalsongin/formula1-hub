<?php

class User {
    private string $username;
    private string $password;
    private string $email;

    public function __construct($username, $password, $email) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
}
