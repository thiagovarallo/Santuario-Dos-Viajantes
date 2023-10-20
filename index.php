<?php

// Função para roteamento
function route($request_uri) {
    $routes = [
        '/' => 'HomeController',
        '/about' => 'AboutController',
        '/contact' => 'ContactController',
        '/admin/formulario/typequarto' => 'AdminFormTypeQuartoController'
    ];

    if (array_key_exists($request_uri, $routes)) {
        $controller = $routes[$request_uri];
        return new $controller();
    } else {
        return new NotFoundController();
    }
}

// Controlador base
class Controller {
    public function render($view) {
        include_once(__DIR__ . '/src/' . $view . '.php');
    }
}

// Controladores de exemplo
class HomeController extends Controller {
    public function __construct() {
        $this->render('home');
    }
}

class AboutController extends Controller {
    public function __construct() {
        $this->render('about');
    }
}

class ContactController extends Controller {
    public function __construct() {
        $this->render('contact');
    }
}
class AdminFormTypeQuartoController extends Controller {
    public function __construct() {
        $this->render('typeRoom');
    }
}

class NotFoundController extends Controller {
    public function __construct() {
        $this->render('404');
    }
}

// Obtém a URI da solicitação
$request_uri = $_SERVER['REQUEST_URI'];

// Remove query strings da URI (se houver)
$request_uri = strtok($request_uri, '?');

// Roteia a solicitação
$route = route($request_uri);
