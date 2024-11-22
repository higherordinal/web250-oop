<?php

class Member extends DatabaseObject {

    static protected $table_name = "users";
    static protected $db_columns = ['id', 'first_name', 'last_name', 'email', 'username', 'hashed_password'];



}

?>