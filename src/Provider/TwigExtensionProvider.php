<?php

/*
 *  (c) Rogério Adriano da Silva <rogerioadris.silva@gmail.com>
 */

namespace Adris\SilexCrud\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Adris\SilexCrud\Twig\AssetTwigFunction;
use Adris\SilexCrud\Twig\CamelizeTwigFunction;
use Adris\SilexCrud\Twig\SecurityTwigFunction;
use Adris\SilexCrud\Twig\SeoTwigFunction;
use Cocur\Slugify\Bridge\Twig\SlugifyExtension;
use Cocur\Slugify\Slugify;

/**
 * Class TwigExtensionProvider.
 *
 * http://silex.sensiolabs.org/doc/providers/twig.html
 */
class TwigExtensionProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given app.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Application $app An Application instance
     */
    public function register(Application $app)
    {
        // http://twig.sensiolabs.org/doc/advanced.html#creating-an-extension
        $app['twig']->addExtension(new AssetTwigFunction($app));

        // https://pt.wikipedia.org/wiki/CamelCase
        $app['twig']->addExtension(new CamelizeTwigFunction($app));

        // Security
        $app['twig']->addExtension(new SecurityTwigFunction($app));

        // S.E.O.
        $app['twig']->addExtension(new SeoTwigFunction($app));

        // https://github.com/cocur/slugify
        $app['twig']->addExtension(new SlugifyExtension(Slugify::create()));
    }

    /**
     * Bootstraps the application.
     *
     * This method is called after all services are registered
     * and should be used for "dynamic" configuration (whenever
     * a service must be requested).
     */
    public function boot(Application $app)
    {
        // TODO: Implement boot() method.
    }
}


