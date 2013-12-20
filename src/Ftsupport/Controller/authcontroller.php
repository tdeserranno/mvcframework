<?php
namespace Ftsupport\Controller;
use Library\Controller;
use Ftsupport\Model\Service\UserService;

/**
 * Description of authcontroller
 *
 * @author cyber02
 */
class AuthController extends Controller
{
    function __construct($app)
    {
        parent::__construct($app);
//        echo 'Login controller';
//        $this->twig = $twig;
    }
    
    function go()
    {
        //check if logged in
        if (!isset($_SESSION['user'])) {
            //display view
            $this->view = $this->app->environment->render('login.twig');
            print($this->view);
        } else {
            throw new \Exception('Already logged in');
        }
    }
    
    function login()
    {
        if (!isset($_SESSION['user'])) {
        //check if POST variables were sent
        if ($this->app->helper->validateForm()) {
            //validate user
            if (UserService::validateUser($_POST['username'], $_POST['password'])) {
                //if login successful, create SESSION variables,  redirect to requested page
                $_SESSION['user'] = $_POST['username'];
                header('Location: '.$_SESSION['prev_req_page']);
                exit();
            } 
        } else {
            //correct POST variables were not sent
            throw new \Exception('POST vars not set');
        }
        } else {
            throw new \Exception('Already logged in');
        }
    }
      
    function logout()
    {
        if (isset($_SESSION['user'])) {
            //unset SESSION var
            unset($_SESSION['user']);
            //redirect to home
            header('Location: /mvcframework/home/go/');
            exit();
        } else {
            throw new \Exception('Cannot log out a user that isn\'t logged in');
        }
    }
}
