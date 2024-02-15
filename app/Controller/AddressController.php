<?php
require_once('./Controller/Controller.php');
require_once('./Model/AddressModel.php');
require_once('./Shared/HttpResponse.php');

class AddressController extends Controller
{
    private $addressModel;

    function __construct()
    {
        parent::__construct();
        $this->addressModel = new AddressModel();
    }

    function getAll()
    {
        $address = $this->addressModel->getAll();

        if ($address) {
            $response = new HttpResponse(200, $address);
        } else {
            $response = new HttpResponse(500, $address);
        }

        return $response;
    }

    function getById($id)
    {
        $address = $this->addressModel->getById($id);

        if ($address) {
            $response = new HttpResponse(200, $address);
        } else {
            $response = new HttpResponse(500, $address);
        }

        return $response;
    }
}
