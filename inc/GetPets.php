<?php

class GetPets
{
    private $args;
    private $placeholders;
    private $count;
    private $pets;

    function __construct()
    {
        global $wpdb;
        $tablename = $wpdb->prefix . "pets";

        $this->args = $this->getArgs();
        $this->placeholders = $this->createPlaceholders();

        $query = "SELECT * FROM $tablename ";
        $query .= $this->createWhereText();
        $query .= " LIMIT 100";


        $this->pets = $wpdb->get_results($wpdb->prepare($query, $this->placeholders));
    }

    public function getPets()
    {
        return $this->pets;
    }
}
