<?php
declare(strict_types = 1);
include_once 'Controller.php';
include_once 'loaders/TeacherLoader.php';
include_once 'loaders/StudentLoader.php';


class TeacherController extends Controller
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
        $teacherLoader = new TeacherLoader(); //see about fitting all the upcoming logic into the loader class directly.
        $classLoader = new ClassLoader();
        $studentLoader = new StudentLoader();
        $locationLoader = new LocationLoader();
        //var_dump($loader->fetchSingle(1));

        //TODO: Implement render() method.
        //check if an item is to be deleted, then delete it.

        if(isset($POST[self::ACTION]))
        {
            //based on the post action, the switch wil do a different action. Speaks for itself I think.
            switch($POST[self::ACTION]){
                case(self::DELETE):
                    $teacherLoader->deleteEntry((int)$POST['id']);
                    unset($GET['id']);
                    break;
                case(self::EDIT):
                    $newTeacher = new Teacher((int)$POST['id'], $POST['firstName'], $POST['lastName'], $POST['email']);
                    $teacherLoader->UpdateEntry($newTeacher);
                    break;
                case(self::CREATE):
                    $newTeacher = new Teacher(0, $POST['firstName'], $POST['lastName'], $POST['email']);
                    $teacherLoader->addEntry($newTeacher);
                    break;
                default:
                    break;
            }
        }

        if (!isset($GET['id']))
        {
            if (isset($GET[self::EXPORT]) && $GET[self::EXPORT] === 'CSV')
            {
                //export CSV file
                //Exporter utility class will handle all the hard work for you
                $exporter = new Exporter();
                $exporter->exportCSV($teacherLoader->fetchAll(), TEACHERS);
            }


            if (isset($GET[self::CREATE]))
            {
                //go to new teachers page
                $teacherData = $teacherLoader->fetchAll();
                require 'View/TeachersNewView.php';
            }
            else
            {
                //go to teacher overview page
                $data = $teacherLoader->fetchall();  //fetch ALL rows
                require 'View/TeachersOverview.php';
            }
        }
        else
        {
            $data = $teacherLoader->fetchSingle((int)$GET['id']);
            $data = $data[0];
            if (isset($GET[self::EDIT]))
            {
                //go to edit page
                $teacherData = $teacherLoader->fetchAll();
                //go to teacher edit page
                require 'View/TeachersEditView.php';
            }
            else
            {
                $teacherData = $teacherLoader->fetchSingle((int)$GET['id']);
                $studentData = $studentLoader->fetchByTeacher((int)$GET['id']);
                //go to teacher edit page
                require 'View/TeachersDetailView.php';
            }
        }
    }
}