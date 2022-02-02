<?php

include "QueryBuilder.php";

class PostgreSQLQueryBuilder implements QueryBuilder
{
    public function queryBuilderFunction() : string
    {
        return "QueryBuilder PostgreSQL";
    }
}