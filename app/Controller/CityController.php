<?php
require_once('./Controller/Controller.php');
require_once('./Model/CityModel.php');
require_once('./Shared/HttpResponse.php');

class CityController extends Controller
{
    private $cityModel;

    function __construct()
    {
        parent::__construct();
        $this->cityModel = new CityModel();
    }

    function getAll()
    {
        $city = $this->cityModel->getAll();
        $city = $this->helper->utf8EncodeDeep($city);

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
        $city = $this->helper->utf8EncodeDeep($city);

        if ($city) {
            $response = new HttpResponse(200, $city);
        } else {
            $response = new HttpResponse(500, $city);
        }

        return $response;
    }
}
