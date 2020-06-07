<?php

/*
 *  (c) Rogério Adriano da Silva <rogerioadris.silva@gmail.com>
 */

namespace Adris\SilexCrud\Controller\Security;

use Adris\SilexCrud\Controller\ContainerAware;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SecurityController.
 */
class SecurityController extends ContainerAware
{
    /**
     * Pagina inicial.
     */
    public function indexAction()
    {
        return $this->render('/security/index.twig');
    }

    /**
     * Pagina de login.
     */
    public function loginAction(Request $request)
    {
        $app = $this->getContainer();

        return $this->render('/security/login.twig', array(
                'error' => $app['security.last_error']($request), // Exibir mensagem de erro
                'last_username' => $this->get('session')->get('_security.last_username'), // Preencher campo com último nome de usuário informado
            )
        );
    }
}
