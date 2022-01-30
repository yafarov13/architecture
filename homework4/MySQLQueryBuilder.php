<?php

include "QueryBuilder.php";

class MySQLQueryBuilder implements QueryBuilder
{
    public function queryBuilderFunction() : string
    {
        return "QueryBuilder MySQL";
    }
}