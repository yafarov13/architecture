<?php


// класс наблюдателя от которого создаем пользователей, которые могут добавлять себе вакансии
class Observer
{
    public $name;
    public $email;
    public $experience;

    public function addVacancy(Vacancy $news) {
        $news->addObserver($this);
    }
    public function deleteVacancy(Vacancy $news) {
        $news->removeObserver($this);
    }

    public function __construct($name, $email, $experience)
    {
        $this->name = $name;
        $this->email = $email;
        $this->experience = $experience;
    }
}


interface IObservable
{
    public function addObserver(Observer $observer);
    public function removeObserver(Observer $observer);
    public function notify();
}

//класс вакансий - тут создаем соответственно вакансии, которые показываются всем наблюдателям
class Vacancy implements IObservable
{
    private $text;
    private $observers;

    public function getText()
    {
        return $this->text;
    }

    public function setText(string $text)
    {
        $this->text = $text;
    }
    public function addObserver(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function removeObserver(Observer $observer)
    {
        foreach ($this->observers as $key => $obsrv) {
            if ($obsrv === $observer) {
                unset($this->observers[$key]);
            }
        }
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            echo "Observer '{$observer->name}' received this message.\n";
        }
    }
}

//создаем наблюдателей и вакансию. Добавляем интересующую вакансию для наблюдателей (и удалаяемся из вакансии). Показываем вакансию наблюдателям
$observer1 = new Observer("Mike", "123@mail.com", 7);
$observer2 = new Observer("Anna", "anna@mail.com", 2);
$vacancy1 = new Vacancy();
$observer1->addVacancy($vacancy1);
$observer2->addVacancy($vacancy1);

//$vacancy1->notify();
//$observer1->deleteVacancy($vacancy1);

$vacancy1->notify();


