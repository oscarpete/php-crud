<?php
declare(strict_types=1);
include_once 'Controller.php';
include_once 'loaders/ClassLoader.php';

class ClassController extends Controller
{

    public function render(array $GET, array $POST): void
    {
        //TODO: implement system to handle what the user wishes to do within the system.
        //  meaning: the controller should be able to go to a different view depending on whether
        //  the user wants an overview, or a view of a specific class/student/teacher
        //  it might be interesting to cram this additional information in the $get,
        //  and then use that to vary between pages
        //  for now, we stick with the overview.

        //var_dump($GET);
        //var_dump($POST);
        $loader = new ClassLoader(); //see about fitting all the upcoming logic into the loader class directly.

        //var_dump($loader->fetchSingle(1));

        //TODO: Implement render() method.
        if (!isset($_GET['id']))
        {
            //go to class overview page
            $data = $loader->fetchall();  //fetch ALL rows
            require 'View/ClassesOverview.php';
        }
        else
        {
            $data = $loader->fetchSingle((int)$GET['id']);
            if (!isset($_GET['edit']))
            {
                //go to class detail page
                $data = $loader->fetchSingle((int)$GET['id']);
                require 'View/ClassesDetailView.php';
            }
            else
            {
                //go to class edit page
                $data = $loader->fetchSingle((int)$GET['id']);
            require 'View/ClassesEditView.php';
            }
        }

    }
}