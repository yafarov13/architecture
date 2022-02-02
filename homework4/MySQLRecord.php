<?php

include "Record.php";

class MySQLRecord implements Record
{
    public function recordFunction() : string
    {
        return "Record MySQL";
    }
}