<?php

include "Record.php";

class OracleRecord implements Record
{
    public function recordFunction() : string
    {
        return "Record Oracle";
    }
}