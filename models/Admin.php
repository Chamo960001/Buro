<?php
//put here the same properties as the DB
namespace models;

class Admin implements \Model
{
    public $id;
    public $firstname;
    public $lastname;
    public $password;
    public $email;
    public $workphone;
    public $desk;
    public $cellphone;
    public $status;
    public $creation_date;
    public $last_connection_date;

    public static function create($db, $array = [])
    {
        //todo: use rtrim for other creates ex: rtrim($attributes, ",") that remove the last comma ","
        //todo: validate password
        //todo: verification for a unique email
        $attributes = "";
        $values = "";
        unset($array['confirm_password']);
        $data = array_values($array);
        foreach ($array as $key => $value) {
            $attributes .= $key . ",";
            $values .= '?,';
        }
        $query = "INSERT INTO ADMINS (" . $attributes . "creation_date ) VALUES (" . $values . "STR_TO_DATE( ?, '%d/%m/%Y %H:%i:%s'))";
        array_push($data, date("d/m/Y H:i:s"));
        $db->prepare($query)->execute($data);
    }

    public static function update($id, $db, $array = [])
    {
        // TODO: Implement update() method.
        $query = 'UPDATE admins SET';
        $comma = ' ';
        foreach ($array as $key => $value) {
            $query .= $comma . $key . " = STR_TO_DATE('" . $value . "', '%d/%m/%Y %H:%i:%s')";
            $comma = ', ';
        }
        $query .= ' where id = ' . $id;
        $db->prepare($query)->execute();
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }
}