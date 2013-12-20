<?php
namespace Ftsupport\Controller;
use Library\Controller;
use Ftsupport\Model\Service\ClientService;
/**
 * Description of clientscontroller
 *
 * @author Thomas
 */
class ClientsController extends Controller
{
    function __construct($app)
    {
        parent::__construct($app);
//        echo 'This is the clients page controller<br>';
//        $this->twig = $twig;
    }
    
    public function viewAll()
    {
        //retrieve model: all clients
        $this->model = ClientService::showAll();
        //display view
        $this->view = $this->app->environment->render('clientlist.twig', array('clients' => $this->model['clients']));
        print($this->view);
    }
    
    public function view($arguments)
    {
        //retrieve model: specific client
        $this->model = ClientService::showDetail($arguments);
        //display view
        $this->view = $this->app->environment->render('clientdetail.twig', array('client' => $this->model['client'], 'contacts' => $this->model['contacts']));
        print($this->view);
    }
    
    public function create()
    {
        //display view
        $this->view = $this->app->environment->render('clientdetail.twig');
        print($this->view);
    }
    
    public function add()
    {
        ClientService::insert();
        header('Location: /mvcframework/clients/viewall');
        exit();
    }
    
    public function delete($arguments)
    {
        ClientService::delete($arguments);
        header('Location: /mvcframework/clients/viewall');
        exit();
    }
    
    public function update()
    {
        ClientService::update();
        //redirect to clientlist
        header('Location: /mvcframework/clients/viewall');
        exit();
    }
}
