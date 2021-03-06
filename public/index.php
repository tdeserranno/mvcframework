<?php
/** Index file essentially functions as a front controller,
 * instanciating the application class running the application
 */

// Initialize Doctrine class loaders
require_once '../src/Library/mvcframework.php';
require_once '../src/Library/application.php';
use Library\Application;
use Library\Helper;

$app = new Application('Ftsupport');

//start secure session
$app->helper->sec_session_start();
//add SESSION as Twig global to allow access directly from any template
$app->environment->addGlobal('session', $_SESSION);

use Ftsupport\Exception\AuthenticationException;
use Ftsupport\Exception\DispatcherException;
try {
    //check if access is allowed to requested page
    
    $app->helper->check_access_allowed();
    //dispatch requested controller
    $app->getDispatcher()->run();
} catch (AuthenticationException $ex) {
    switch ($ex->getCode()) {
        case '1':
            //before redirecting to login page store requested page in SESSION to use
            //for redirecting after login
            $_SESSION['prev_req_page'] = $_SERVER['REQUEST_URI'];
            header('Location: /mvcframework/auth/go');
            exit();
            break;
        case '2':
            print($app->environment->render('login.twig', array('exception' => $ex)));
            break;
        default: 
            print($app->environment->render('error.twig', array('exception' => $ex)));
            break;
    }
} catch (DispatcherException $ex) {
    print($app->environment->render('error.twig', array('exception' => $ex)));
} catch (Exception $ex) {
    print($app->environment->render('error.twig', array('exception' => $ex)));
}
