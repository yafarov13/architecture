<?php

include "Connection.php";

class PostgreSQLConnection implements Connection
{
    public function connectionFunction() : string
    {
        return "Connection PostgreSQL";
    }
}