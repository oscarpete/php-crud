<?php
declare(strict_types=1);

//include all your model files here
require_once 'Model/Entity.php';
require 'Model/Teacher.php';
require 'Model/User.php';
require 'Model/SchoolClass.php';

//include all your controllers here
require 'Controller/HomepageController.php';
require 'Controller/InfoController.php';
require 'Controller/TeacherController.php';
require 'Controller/ClassController.php';

//you could write a simple IF here based on some $_GET or $_POST vars, to choose your controller
//this file should never be more than 20 lines of code!

$controller = new HomepageController();
//if(isset($_GET['page']) && $_GET['page'] === 'info') {
//    $controller = new InfoController();
//}
//
//if(isset($_GET['page']) && $_GET['page'] === 'classes') {
//    $controller = new ClassController();
//}

if(isset($_GET['page']))
{
    SWITCH($_GET['page']){
        case('info'):
            $controller = new InfoController();
            break;
        case('classes'):
            $controller = new ClassController();
            break;
        case('teachers'):
            $controller = new TeacherController();
            break;
        case('students'):
            $controller = new StudentController();
            break;
        default: break;
    }
}


$controller->render($_GET, $_POST);