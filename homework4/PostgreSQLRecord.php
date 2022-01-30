<?php

include "Record.php";

class PostgreSQLRecord implements Record
{
    public function recordFunction() : string
    {
        return "Record PostgreSQL";
    }
}