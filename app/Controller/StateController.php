<?php
require_once('./Model/StateModel.php');
require_once('./Shared/HttpResponse.php');

class StateController
{
    private $stateModel;

    function __construct()
    {
        $this->stateModel = new StateModel();
    }

    function getAll()
    {
        $state = $this->stateModel->getAll();

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

        if ($state) {
            $response = new HttpResponse(200, $state);
        } else {
            $response = new HttpResponse(500, $state);
        }

        return $response;
    }
}
