<?php

/*
 *  (c) Rogério Adriano da Silva <rogerioadris.silva@gmail.com>
 */

namespace Adris\SilexCrud\Traits;

trait FlashMessageTrait
{
    /**
     * Retorna Flash message.
     *
     * @return \Symfony\Component\HttpFoundation\Session\Flash\FlashBag
     */
    protected function flashMessage()
    {
        return $this->get('session')->getFlashBag();
    }
}
