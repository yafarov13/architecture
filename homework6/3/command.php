<?php

class TextEdit
{
    public $text;

    public function __construct(string $text = "")
    {
        $this->text = $text;
    }

    public function addText(string $text)
    {
        $this->text = $text;
        echo "добавление текста\n";
    }

    public function copyText()
    {
        echo "копирование текста\n";
        return $this->text;
    }

    public function deleteText()
    {
        echo "удаление текста\n";
        $this->text = "";
    }
}


class RemoteControl
{
    public $lastText;
    public $newText;
    public $textEdit;

    public function __construct(TextEdit $textEdit)
    {
        $this->textEdit = $textEdit;
    }

    public function remoteAddText(string $text)
    {
        $this->lastText = $this->textEdit->text;
        $this->textEdit->addText($text);
        $this->newText = $this->textEdit->text;
        echo "добавили текст\n";
    }

    public function remoteDeleteText()
    {
        $this->lastText = $this->textEdit->text;
        $this->textEdit->deleteText();
        $this->newText = $this->textEdit->text;
        echo "удалили текст\n";
    }

    public function cancelAction()
    {
        $this->textEdit->text = $this->lastText;
    }

    public function returnAction()
    {
        $this->textEdit->text = $this->newText;
    }

}

//тестирование
//создаем объект text1, который будем изменять, а также контролирующий команды объект remoteText
$text1 = new TextEdit('abc');
echo "{$text1->text}" . "\n";
$remoteText = new RemoteControl($text1);

//изменяем текст на 'xyz'
$remoteText->remoteAddText('xyz');
echo "{$text1->text}" . "\n";

//отменяем операцию изменения
$remoteText->cancelAction();
echo "{$text1->text}" . "\n";

//возвращаем операцию изменения
$remoteText->returnAction();
echo "{$text1->text}" . "\n";


