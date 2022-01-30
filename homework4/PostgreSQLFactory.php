<?php

include "AbstractFactory.php";

class PostgreSQLFactory extends AbstractFactory
{
    public function getConnection() : Connection
    {

        return new PostgreSQLConnection();
    }

    public function getRecord() : Record
    {

        return new PostgreSQLRecord();
    }

    public function getQueryBuilder() : QueryBuilder
    {

        return new PostgreSQLQueryBuilder();
    }

}