<?php
declare(strict_types = 1);
include_once 'Controller.php';
include_once 'loaders/ClassLoader.php';
class ClassController extends Controller
{

    public function render(array $GET, array $POST)
    {
        //TODO: implement system to handle what the user wishes to do within the system.
        //  meaning: the controller should be able to go to a different view depending on whether
        //  the user wants an overview, or a view of a specific class/student/teacher
        //  it might be interesting to cram this additional information in the $get,
        //  and then use that to vary between pages
        //  for now, we stick with the overview.

        //start up loader
        $loader = new ClassLoader();
        $pdo = $loader->connect();

        $handle = $pdo->prepare('SELECT className, location FROM crud.class ORDER BY class.id');
        $handle->execute();
        $classes = $handle->fetchAll();

        //TODO: Implement render() method.
        require 'View/ClassesOverview.php';
    }
}