<?php

include "AbstractFactory.php";

class MySQLFactory extends AbstractFactory
{
    public function getConnection() : Connection
    {

        return new MySQLConnection();
    }

    public function getRecord() : Record
    {

        return new MySQLRecord();
    }

    public function getQueryBuilder() : QueryBuilder
    {

        return new MySQLQueryBuilder();
    }

}