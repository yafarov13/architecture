<?php

include "Connection.php";


class MySQLConnection implements Connection
{
    public function connectionFunction() : string
    {
        return "Connection MySQL";
    }
}