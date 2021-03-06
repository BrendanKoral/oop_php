<?php

class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function instantiation($the_record) {

        $the_object = new self;

        foreach ($the_record as $the_attribute => $value) {

            if($the_object->has_the_attribute($the_attribute) ) {

                $the_object->the_attribute = $value;

            }

        }

        return $the_object;

    }

    private function has_the_attribute($the_attribute) {

        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);

    }

    public static function find_all_users() {

        return self::find_this_query("SELECT * FROM users");

    }

    public static function find_user_by_id($user_id) {

        global $database;

        $result_set = self::find_this_query("SELECT * FROM users WHERE id = $user_id");

        $found_user = mysqli_fetch_array($result_set);

        return $found_user;

    }

    public static function find_this_query($query) {

        global $database;

        $result_set = $database->query($query);

        $the_object_array = array();

        while( $row = mysqli_fetch_array($result_set) ) {

            $the_object_array[] = self::instantiation($row);

        }

        return $the_object_array;

    }

}