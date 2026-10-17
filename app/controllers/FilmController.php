
<?php

require_once __DIR__ . '/../models/Film.php';

class FilmController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new Film($db);
    }

    public function index()
    {
        $films = $this->model->getAll();

        require __DIR__ . '/../views/film/index.php';
    }
}
