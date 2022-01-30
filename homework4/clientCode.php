<?php
function clientCode(AbstractFactory $factory)
{

    $dbConnection = $factory->getConnection();
    $dbRecord = $factory->getRecord();
    $dbQueryBuilder = $factory->getQueryBuilder();

    echo $dbConnection->connectionFunction() . "\n";
    echo $dbRecord->recordFunction() . "\n";
    echo $dbQueryBuilder->queryBuilderFunction() . "\n";
}

echo "Client: Testing client code with the first factory type:\n";
clientCode(new MySQLFactory());

echo "\n";

echo "Client: Testing the same client code with the second factory type:\n";
clientCode(new PostgreSQLFactory());

echo "\n";

echo "Client: Testing the same client code with the third factory type:\n";
clientCode(new OracleFactory());