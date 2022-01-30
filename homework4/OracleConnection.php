<?php

include "Connection.php";

class OracleConnection implements Connection
{
    public function connectionFunction() : string
    {
        return "Connection Oracle";
    }
}