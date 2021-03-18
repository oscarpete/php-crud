<?php
declare(strict_types=1);

//include all your model files here
require_once 'Model/Entity.php';
require_once 'Model/Teacher.php';
require_once 'Model/User.php';
require_once 'Model/SchoolClass.php';
//require_once 'Model/Student.php';

//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/InfoController.php';
require 'Controller/TeacherController.php';
require 'Controller/ClassController.php';
require 'Controller/StudentController.php';

//let's throw in a few CONST value that might be useful for navigation.
//might be interesting to store these in an array or use classes
//but I don't really have the time to engineer that, so let's leave it at this.
CONST INFO = 'info';
CONST CLASSES = 'classes';
CONST TEACHERS = 'teachers';
CONST STUDENTS = 'students';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!

//var_dump($_POST);
$controller = new HomepageController();
if(isset($_GET['page']))
{
    switch ($_GET['page'])
    {
        case(INFO):
            $controller = new InfoController();
            break;
        case(CLASSES):
            $controller = new ClassController();
            break;
        case(TEACHERS):
            $controller = new TeacherController();
            break;
        case(STUDENTS):
            $controller = new StudentController();
            break;
        default:
            break;
    }
}

$controller->render($_GET, $_POST);