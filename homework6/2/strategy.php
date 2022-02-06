<?php
class SocksOrder
{
    public $numberOfSocks;

    public function __construct(int $numberOfSocks)
    {
        $this->numberOfSocks = $numberOfSocks;
    }
}

interface IPayment
{
    public function createPayment(SocksOrder $order);
}

class QiwiPayment implements IPayment
{
    public function createPayment(SocksOrder $order)
    {
        echo "Оплата {$order->numberOfSocks} пар носков через Qiwi.\n";
    }
}

class YandexPayment implements IPayment
{
    public function createPayment(SocksOrder $order)
    {
        echo "Оплата {$order->numberOfSocks} пар носков через Яндекс.\n";
    }
}

class WebMoneyPayment implements IPayment
{
    public function createPayment(SocksOrder $order)
    {
        echo "Оплата {$order->numberOfSocks} пар носков через WebMoney.\n";
    }
}


class FinalPayment
{
    public function choosingPaymentStrategy(IPayment $payment, SocksOrder $socksOrder)
    {
        echo "Некоторая бизнес-логика... \n";
        return $payment->createPayment($socksOrder);
    }
}

//создание заказа, выбор оплаты

$order1 = new SocksOrder(5);

$payment = new FinalPayment();

$payment->choosingPaymentStrategy(new QiwiPayment(), $order1);
$payment->choosingPaymentStrategy(new YandexPayment(), $order1);
$payment->choosingPaymentStrategy(new WebMoneyPayment(), $order1);



