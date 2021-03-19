<?php
declare(strict_types=1);

abstract class Controller
{
    //constants for easy control
    protected const CREATE = 'create';
    protected const EDIT = 'edit';
    protected const DELETE = 'delete';
    protected const EXPORT = 'export';
    protected const ACTION = 'action';
    //the controller classes are made to handle a redirect from the index
    //the index will call a controller class, whose job it then is to load all the necessary information on its respective pages
    //the controller will then also be responsible for switching between its subsidiary pages
    abstract public function render(array $GET, array $POST);


}