<?php

class Bookmark {

    private $connection;
    private $table = 'api';

    public $id;
    public $url;

    public function __construct($db) {
        $this -> connection = $db;
    }

    public function read() {
        $query = '
            SELECT
                id, url 
            FROM
                ' . $this -> table
        ;
        $statement = $this -> connection -> prepare($query);
        $statement -> execute();
        return $statement;
    }

    public function read_single() {
        $query = '
            SELECT
                id, url 
            FROM
                ' . $this -> table . '
            WHERE
                id = ?
        ';
        $statement = $this -> connection -> prepare($query);
        $statement -> bindParam(1, $this -> id);
        $statement -> execute();

        $row = $statement -> fetch(PDO::FETCH_ASSOC);
        $this -> url = $row['url'];

        return $statement;
    }

    public function add() {

        $query = '
            INSERT INTO '
                . $this -> table . 
            ' SET 
                url = :url
        ';

        $statement = $this -> connection -> prepare($query);

        // TODO: decode?
        // $this -> url = ...

        $statement -> bindParam(':url', $this -> url);

        if ($statement -> execute()) {
            return true;
        }

        // Something went wrong
        printf("Error: %s. \n", $statement -> error);

        return false;

    }

    public function edit() {

        $query = '
            UPDATE '
                . $this -> table . 
            ' SET 
                url = :url
            WHERE
                id = :id
        ';

        $statement = $this -> connection -> prepare($query);

        // TODO: decode?
        // $this -> url = ...

        $statement -> bindParam(':url', $this -> url);
        $statement -> bindParam(':id', $this -> id);

        if ($statement -> execute()) {
            return true;
        }

        // Something went wrong
        printf("Error: %s. \n", $statement -> error);

        return false;

    }

    public function delete() {

        $query = '
            DELETE FROM 
                ' . $this -> table . '
            WHERE
                id = :id
        ';

        $statement = $this -> connection -> prepare($query);

        $statement -> bindParam(':id', $this -> id);

        if ($statement -> execute()) {
            return true;
        }

        // Something went wrong
        printf("Error: %s. \n", $statement -> error);

        return false;


    }

}

?>