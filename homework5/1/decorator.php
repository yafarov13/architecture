<?php

class Notifier
{
    protected $notifier;

    public function __construct(Notifier $nextNotifier = null)
    {
        $this->notifier = $nextNotifier;
    }

    public function send($message)
    {
        if ($this->notifier) {
            $this->notifier->send($message);
        }
    }
}


class EmailNotifier extends Notifier
{
    public function send($message)
    {
        //реализовать логику отправки самого сообщения
        parent::send($message);
    }
}

class SlackNotifier extends Notifier
{
    public function send($message)
    {
        //реализовать логику отправки самого сообщения
        parent::send($message);
    }
}

$notifier = new Notifier();
$notifier = new EmailNotifier($notifier);
$notifier = new SlackNotifier($notifier);
$notifier->send("message");
