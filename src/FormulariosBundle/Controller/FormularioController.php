<?php

namespace FormulariosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FormularioController extends Controller {

    public function indexAction() {
        return $this->render('@Formularios/Formulario/index.html.twig');
    }

    public function nuevoAction() {
        return $this->render('@Formularios/Formulario/nuevo.html.twig');
    }

    public function crearAction(Request $request) {
        
    }

}
