<?php

namespace FormulariosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FormulariosBundle\Entity\PcFormulario;

class FormularioController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        
        $procesos = $em->getRepository('FormulariosBundle:PcFormulario')->findBy(array(), array('numeroproceso' => 'ASC'));
        
        return $this->render('@Formularios/Formulario/index.html.twig', array(
            'procesos' => $procesos
        ));
    }

    public function nuevoAction() {
        $em = $this->getDoctrine()->getManager();

        $anterior = $em->getRepository('FormulariosBundle:PcFormulario')->ultimoConsecutivo();        
        $numero = $this->crearConsecutivo($anterior);

        return $this->render('@Formularios/Formulario/nuevo.html.twig', array(
                    'numero' => $numero
        ));
    }

    public function crearAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        
        $formulario = new PcFormulario();
        $formulario->setNumeroproceso($request->get('numeroproceso'));
        $formulario->setDescripcion($request->get('descripcion'));
        $formulario->setSede($request->get('sede'));
        $formulario->setPresupuesto($request->get('valor'));
        $formulario->setFechacreacion(new \DateTime());
        
        $em->persist($formulario);
        $em->flush();
        
        $procesos = $em->getRepository('FormulariosBundle:PcFormulario')->findBy(array(), array('numeroproceso' => 'ASC'));
        
        return $this->render('@Formularios/Formulario/index.html.twig', array(
            'procesos' => $procesos
        ));
    }

    public function crearConsecutivo($anterior) {
        $nuevo = '';
        if ($anterior != '') {
            $anterior++;
            if ($anterior < 10) {
                $nuevo .= "0000000" . $anterior ;
            } else {
                if ($anterior < 100) {
                    $nuevo .= "000000" . $anterior ;
                } else {
                    if ($anterior < 1000) {
                        $nuevo .= "00000" . $anterior ;
                    } else {
                        if ($anterior < 10000) {
                            $nuevo .= "0000" . $anterior ;
                        } else {
                            if ($anterior < 100000) {
                                $nuevo .= "000" . $anterior ;
                            } else {
                                if ($anterior < 1000000) {
                                    $nuevo .= "00" . $anterior ;
                                } else {
                                    if ($anterior < 10000000) {
                                        $nuevo .= "0" . $anterior ;
                                    } else {
                                        $nuevo .= $anterior;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } else {
            $nuevo = '00000000';
        }

        return $nuevo;
    }
    
    public function editarAction($id) {
        $em = $this->getDoctrine()->getManager();
        
        $proceso = $em->getRepository('FormulariosBundle:PcFormulario')->find($id);
        
        return $this->render('@Formularios/Formulario/editar.html.twig', array(
            'proceso' => $proceso
        ));
    }
    
    public function actualizarAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();

        $formulario = $em->getRepository('FormulariosBundle:PcFormulario')->find($id);
        
        $formulario->setNumeroproceso($request->get('numeroproceso'));
        $formulario->setDescripcion($request->get('descripcion'));
        $formulario->setSede($request->get('sede'));
        $formulario->setPresupuesto($request->get('valor'));
        
        $em->persist($formulario);
        $em->flush();
        
        $procesos = $em->getRepository('FormulariosBundle:PcFormulario')->findBy(array(), array('numeroproceso' => 'ASC'));
        
        return $this->render('@Formularios/Formulario/index.html.twig', array(
            'procesos' => $procesos
        ));
    }

}
