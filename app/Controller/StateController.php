<?php
require_once('./Controller/Controller.php');
require_once('./Model/StateModel.php');
require_once('./Shared/HttpResponse.php');

class StateController extends Controller
{
    private $stateModel;

    function __construct()
    {
        parent::__construct();
        $this->stateModel = new StateModel();
    }

    function getAll()
    {
        $state = $this->stateModel->getAll();
        $state = $this->helper->utf8EncodeDeep($state);

        if ($state) {
            $response = new HttpResponse(200, $state);
        } else {
            $response = new HttpResponse(500, $state);
        }

        return $response;
    }

    function getById($id)
    {
        $state = $this->stateModel->getById($id);
        $state = $this->helper->utf8EncodeDeep($state);

        if ($state) {
            $response = new HttpResponse(200, $state);
        } else {
            $response = new HttpResponse(500, $state);
        }

        return $response;
    }
}
