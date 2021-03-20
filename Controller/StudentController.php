<?php
declare(strict_types = 1);
include_once 'Controller.php';
include_once 'loaders/StudentLoader.php';

class StudentController extends Controller
{
    public function getCREATE(): string
    {
        return static::CREATE;
    }

    public function getEDIT(): string
    {
        return static::EDIT;
    }
    public function getDELETE(): string
    {
        return static::DELETE;
    }

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
        $studentLoader = new StudentLoader(); //see about fitting all the upcoming logic into the loader class directly.
        $classLoader = new ClassLoader();
        //var_dump($loader->fetchSingle(1));

        //TODO: Implement render() method.
        //check if an item is to be deleted, then delete it.
        if(isset($POST[self::ACTION]))
        {
            //based on the post action, the switch wil do a different action. Speaks for itself I think.
            switch($POST[self::ACTION]){
                case(self::DELETE):
                    $studentLoader->deleteEntry((int)$POST['id']);
                    unset($GET['id']);
                    break;
                case(self::EDIT):
                    $newStudent = new Student((int)$POST['id'], $POST['firstName'], $POST['lastName'], $POST['email'], (int)$POST['classId']);
                    $studentLoader->UpdateEntry($newStudent);
                    break;
                case(self::CREATE):
                    var_dump($POST);
                    $newStudent = new Student(0, $POST['firstName'], $POST['lastName'], $POST['email'], (int)$POST['classId']);
                    $studentLoader->addEntry($newStudent);
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
                $exporter->exportCSV($studentLoader->fetchAll(), STUDENTS);
            }


            if (isset($GET[self::CREATE]))
            {
                //go to new student page
                $studentData = $studentLoader->fetchAll();
                $classData = $classLoader->fetchAll();
                require 'View/StudentsNewView.php';
            }
            else
            {
                //go to teacher overview page
                $data = $studentLoader->fetchall();  //fetch ALL rows
                require 'View/StudentsOverview.php';
            }
        }
        else
        {
            $data = $studentLoader->fetchSingle((int)$GET['id']);
            $data = $data[0];
            if (isset($GET[self::EDIT]))
            {
                //go to edit page
                $action = self::EDIT;
                $classData = $classLoader->fetchAll();
                //go to student edit page
                require 'View/StudentsEditView.php';
            }
            else
            {
                $studentData = $studentLoader->fetchAll();
                //go to student edit page
                require 'View/StudentsDetailView.php';
            }
        }
    }
}