<?php

include "QueryBuilder.php";

class OracleQueryBuilder implements QueryBuilder
{
    public function queryBuilderFunction() : string
    {
        return "QueryBuilder Oracle";
    }
}