<?php
declare(strict_types=1);
include_once 'Controller.php';
include_once 'Utilities/Exporter.php';
include_once 'loaders/ClassLoader.php';
include_once 'loaders/TeacherLoader.php';
include_once 'loaders/LocationLoader.php';

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

//        var_dump($GET);
//        echo("POST: ");
//        var_dump($POST);
        $classLoader = new ClassLoader(); //see about fitting all the upcoming logic into the loader class directly.
        $teacherLoader = new TeacherLoader();
        $locationLoader = new LocationLoader();
        //var_dump($loader->fetchSingle(1));
        //TODO: Implement delete() method.

        //check if an item is to be deleted, then delete it.
        if(isset($POST['action']))
        {
            //based on the post action, the switch wil do a different action. Speaks for itself I think.
            switch($POST['action']){
                case('delete'):
                    $classLoader->deleteEntry((int)$POST['id']);
                    unset($GET['id']);
                    break;
                case('edit'):
                    $newClass = new SchoolClass((int)$POST['id'], $POST['name'], $POST['teacher'], $POST['location']);
                    $classLoader->UpdateEntry($newClass);
                    break;
                case('create'):
                    $newClass = new SchoolClass(0, $POST['name'], $POST['teacher'], $POST['location']);
                    $classLoader->addEntry($newClass);
                    break;
                default:
                    break;
            }
        }

        if (!isset($GET['id']))
        {
            if (isset($GET['export']) && $GET['export'] === 'CSV')
            {
                //export CSV file
                //Exporter utility class will handle all the hard work for you
                $exporter = new Exporter();
                $exporter->exportCSV($classLoader->fetchAll(), CLASSES);
            }

            if (isset($GET['create']))
            {
                //go to new class page
                //this reference to teacherData is needed to create a list of teachers that you can pick from, otherwise it'll cause problems.
                $teacherData = $teacherLoader->fetchAll();
                $locationData = $locationLoader->fetchAll();
                require 'View/ClassesNewView.php';
            }
            else
            {
                //go to class overview page
                $data = $classLoader->fetchall();  //fetch ALL rows
                require 'View/ClassesOverview.php';
            }
        }
        else
        {
            $data = $classLoader->fetchSingle((int)$GET['id']);
            $data = $data[0];
            if (isset($GET['edit']))
            {
                //go to edit page
                $teacherData = $teacherLoader->fetchAll();
                $locationData = $locationLoader->fetchAll();
                //go to class edit page
                require 'View/ClassesEditView.php';
            }
            else
            {
                $teacherData = $teacherLoader->fetchAll();
                //TODO: needs a function from studentLoader that can give me all students in a specific class.
                //      Should be able to take an ID parameter and work from there.
                //go to class edit page
                require 'View/ClassesDetailView.php';
            }
        }
    }
}