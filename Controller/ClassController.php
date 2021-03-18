<?php
declare(strict_types=1);
include_once 'Controller.php';
include_once 'Utilities/Exporter.php';
include_once 'loaders/ClassLoader.php';
include_once 'loaders/TeacherLoader.php';

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
        //var_dump($loader->fetchSingle(1));
        //TODO: Implement delete() method.

        //check if an item is to be deleted, then delete it.
        if (isset($POST['delete'], $POST['id']))
        {
            $classLoader->deleteEntry((int)$POST['id']);
            unset($GET['id']);
        }
        if (isset($POST['edit'], $POST['id']))
        {
            $newClass = new SchoolClass((int)$POST['id'], $POST['name'], $POST['teacher'], $POST['location']);
            $classLoader->UpdateEntry($newClass);
        }
        if (isset($POST['create']))
        {
            $newClass = new SchoolClass(0, $POST['name'], $POST['teacher'], $POST['location']);
            $classLoader->addEntry($newClass);
        }

        if (!isset($GET['id']))
        {
            if (isset($GET['export']) && $GET['export'] === 'CSV')
            {
                //export CSV file
                //Exporter utility class will handle all the hard work for you
                $exporter = new Exporter();
                $exporter->exportCSV($classLoader->fetchAll(), 'classes');
            }

            if (isset($GET['create']))
            {
                //go to new class page
                //this reference to teacherData is needed to create a list of teachers that you can pick from, otherwise it'll cause problems.
                $teacherData = $teacherLoader->fetchAll();
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