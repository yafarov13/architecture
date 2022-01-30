<?php

include "AbstractFactory.php";

class OracleFactory extends AbstractFactory
{
    public function getConnection() : Connection
    {

        return new OracleConnection();
    }

    public function getRecord() : Record
    {

        return new OracleRecord();
    }

    public function getQueryBuilder() : QueryBuilder
    {

        return new OracleQueryBuilder();
    }

}