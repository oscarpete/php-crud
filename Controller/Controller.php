<?php
declare(strict_types=1);

abstract class Controller
{
    abstract public function render(array $GET, array $POST);
}