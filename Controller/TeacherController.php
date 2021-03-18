<?php
declare(strict_types = 1);
include_once 'Controller.php';
include_once 'loaders/TeacherLoader.php';


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
        //var_dump($loader->fetchSingle(1));

        //TODO: Implement render() method.
        //check if an item is to be deleted, then delete it.
        if (isset($POST['delete'], $POST['id']))
        {
            $teacherLoader->deleteEntry((int)$POST['id']);
            unset($GET['id']);
        }
        if (isset($POST['edit'], $POST['id']))
        {
            $newTeacher = new Teacher((int)$POST['id'], $POST['firstName'], $POST['lastName'], $POST['email']);
            $teacherLoader->UpdateEntry($newTeacher);
        }
        if (isset($POST['create']))
        {
            $newTeacher = new Teacher(0, $POST['firstName'], $POST['lastName'], $POST['email']);
            $teacherLoader->addEntry($newTeacher);
        }


        if (!isset($GET['id']))
        {
            if (isset($GET['create']))
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
            if (isset($GET['edit']))
            {
                //go to edit page
                $teacherData = $teacherLoader->fetchAll();
                //go to teacher edit page
                require 'View/TeachersEditView.php';
            }
            else
            {
                $teacherData = $teacherLoader->fetchAll();
                //go to teacher edit page
                require 'View/TeachersDetailView.php';
            }
        }
    }
}