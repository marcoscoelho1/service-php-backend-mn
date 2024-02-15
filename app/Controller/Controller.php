<?php
require_once('./Helpers/ApplicationHelper.php');

class Controller
{
    public $helper;

    function __construct()
    {
        $this->helper = new ApplicationHelper();
    }
}
