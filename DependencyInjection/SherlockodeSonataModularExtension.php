<?php

namespace Sherlockode\SonataModularBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class SherlockodeSonataModularExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
    }

    public function prepend(ContainerBuilder $container)
    {
        $bundles = $container->getParameter('kernel.bundles');
        if (isset($bundles['SonataAdminBundle'])) {
            $config = [
                'templates' => [
                    'list'                => 'SherlockodeSonataModularBundle:CRUD:list.html.twig',
                    'show'                => 'SherlockodeSonataModularBundle:CRUD:show.html.twig',
                    'edit'                => 'SherlockodeSonataModularBundle:CRUD:edit.html.twig',
                    'layout'              => 'SherlockodeSonataModularBundle::standard_layout.html.twig',
                    'knp_menu_template'   => 'SherlockodeSonataModularBundle:Menu:sonata_menu.html.twig',
                    'button_create'       => 'SherlockodeSonataModularBundle:Button:create_button.html.twig',
                    'button_edit'         => 'SherlockodeSonataModularBundle:Button:edit_button.html.twig',
                    'button_show'         => 'SherlockodeSonataModularBundle:Button:show_button.html.twig',
                    'button_list'         => 'SherlockodeSonataModularBundle:Button:list_button.html.twig',
                    'pager_links'         => 'SherlockodeSonataModularBundle:Pager:links.html.twig',
                    'search_result_block' => 'SherlockodeSonataModularBundle:Block:block_search_result.html.twig',

                ],
                'assets'    => [
                    'stylesheets' => [
                        'bundles/sonatacore/vendor/components-font-awesome/css/font-awesome.min.css',
                        'bundles/sonatacore/vendor/ionicons/css/ionicons.min.css',
                        'bundles/sonataadmin/vendor/admin-lte/dist/css/AdminLTE.min.css',
                        'bundles/sonataadmin/vendor/admin-lte/dist/css/skins/skin-black.min.css',
                        'bundles/sonataadmin/vendor/iCheck/skins/square/blue.css',
                        'bundles/sonatacore/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
                        'bundles/sonatacore/vendor/select2/select2.css',
                        'bundles/sonatacore/vendor/select2-bootstrap-css/select2-bootstrap.min.css',
                        'bundles/sonataadmin/vendor/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css',
                        'bundles/sonataadmin/css/tree.css',
                        'bundles/sherlockodesonatamodular/css/vendor.css',
                        'bundles/sherlockodesonatamodular/css/app.css',
                        'bundles/sherlockodesonatamodular/css/style.css',
                    ],
                    'javascripts' => [
                        'bundles/sherlockodesonatamodular/js/vendor.js',
                        'bundles/sonataadmin/vendor/jquery.scrollTo/jquery.scrollTo.min.js',
                        'bundles/sonatacore/vendor/moment/min/moment.min.js',
                        'bundles/sonatacore/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
                        'bundles/sonataadmin/vendor/jqueryui/ui/minified/jquery-ui.min.js',
                        'bundles/sonataadmin/vendor/jqueryui/ui/minified/i18n/jquery-ui-i18n.min.js',
                        'bundles/sonataadmin/vendor/jquery-form/jquery.form.js',
                        'bundles/sonataadmin/jquery/jquery.confirmExit.js',
                        'bundles/sonataadmin/vendor/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js',
                        'bundles/sonatacore/vendor/select2/select2.min.js',
                        'bundles/sonataadmin/vendor/iCheck/icheck.min.js',
                        'bundles/sonataadmin/vendor/slimScroll/jquery.slimscroll.min.js',
                        'bundles/sonataadmin/vendor/waypoints/lib/jquery.waypoints.min.js',
                        'bundles/sonataadmin/vendor/waypoints/lib/shortcuts/sticky.min.js',
                        'bundles/sonataadmin/vendor/readmore-js/readmore.min.js',
                        'bundles/sonataadmin/Admin.js',
                        'bundles/sonataadmin/treeview.js',
                        'bundles/sonataadmin/sidebar.js',
                        'bundles/sherlockodesonatamodular/js/app.js',
                    ],
                ],
            ];

            $container->prependExtensionConfig('sonata_admin', $config);
        }
    }
}
