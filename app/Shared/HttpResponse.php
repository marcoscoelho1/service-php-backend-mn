<?php
class HttpResponse
{
    private $statusCode;
    private $response;

    public function __construct($statusCode, $response)
    {
        $this->statusCode = $statusCode;
        $this->response = $response;
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function setResponse($response)
    {
        $this->response = $response;
    }

    public function getFormatedResponse()
    {
        $formatedResponse = ['statusCode' => $this->statusCode, 'data' => $this->response];
        return json_encode($formatedResponse);
    }
}
