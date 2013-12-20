<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Ftsupport\Controller;
use Library\Controller;
/**
 * Description of indexcontroller
 *
 * @author Thomas
 */
class HomeController extends Controller
{
//    function __construct($twig)
    function __construct($app)
    {
        parent::__construct($app);
//        echo 'Homepage controller<br>';
//        $this->twig = $twig;
    }
    
    function go()
    {
        $this->view = $this->app->environment->render('home.twig');
        print($this->view);
    }
}
