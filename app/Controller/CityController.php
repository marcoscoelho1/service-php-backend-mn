<?php
require_once('./Model/CityModel.php');
require_once('./Shared/HttpResponse.php');

class CityController
{
    private $cityModel;

    function __construct()
    {
        $this->cityModel = new CityModel();
    }

    function getAll()
    {
        $city = $this->cityModel->getAll();

        if ($city) {
            $response = new HttpResponse(200, $city);
        } else {
            $response = new HttpResponse(500, $city);
        }

        return $response;
    }

    function getById($id)
    {
        $city = $this->cityModel->getById($id);

        if ($city) {
            $response = new HttpResponse(200, $city);
        } else {
            $response = new HttpResponse(500, $city);
        }

        return $response;
    }
}
