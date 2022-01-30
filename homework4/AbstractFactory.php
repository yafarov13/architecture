<?php

abstract class AbstractFactory
{
    abstract public function getConnection() : Connection;

    abstract public function getRecord() : Record;

    abstract public function getQueryBuilder() : QueryBuilder;
}

