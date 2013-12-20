<?php
namespace Ftsupport\Controller;
use Library\Controller;
use Ftsupport\Model\Service\ContactService;

/**
 * Description of contactscontroller
 *
 * @author cyber02
 */
class ContactsController extends Controller
{
    function __construct($app)
    {
        parent::__construct($app);
//        echo 'This is the contacts page controller<br>';
//        $this->twig = $twig;
    }
    
    public function view($arguments)
    {
        //retrieve model: contact by id
        $this->model = ContactService::showDetail($arguments);
        //display view
        $this->view = $this->app->environment->render('contactdetail.twig', array('contact' => $this->model['contact']));
        print($this->view);
    }
    
    public function create($arguments)
    {
        //display view
        $this->view = $this->app->environment->render('contactdetail.twig', array('clientid' => $arguments[0]));
        print($this->view);
    }
    
    public function add()
    {
        ContactService::insert();
        header('Location: /mvcframework/clients/view/'.$_POST['clientid']);
        exit();
    }
    
    public function update()
    {
        ContactService::update();
        header('Location: /mvcframework/clients/view/'.$_POST['clientid']);
        exit();
    }
    
    public function delete($arguments)
    {
        ContactService::delete($arguments);
        header('Location: /mvcframework/clients/view/'.$arguments[1]);
        exit();
    }
}
