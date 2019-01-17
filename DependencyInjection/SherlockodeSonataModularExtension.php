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
        $bundleConfiguration = $container->getExtensionConfig('sherlockode_sonata_modular')[0];

        $bundles = $container->getParameter('kernel.bundles');
        if (isset($bundles['SonataAdminBundle'])) {
            $config = [
                'templates' => [
                    'list'                => '@SherlockodeSonataModular/CRUD/list.html.twig',
                    'show'                => '@SherlockodeSonataModular/CRUD/show.html.twig',
                    'edit'                => '@SherlockodeSonataModular/CRUD/edit.html.twig',
                    'layout'              => '@SherlockodeSonataModular/standard_layout.html.twig',
                    'knp_menu_template'   => '@SherlockodeSonataModular/Menu/sonata_menu.html.twig',
                    'button_create'       => '@SherlockodeSonataModular/Button/create_button.html.twig',
                    'button_edit'         => '@SherlockodeSonataModular/Button/edit_button.html.twig',
                    'button_show'         => '@SherlockodeSonataModular/Button/show_button.html.twig',
                    'button_list'         => '@SherlockodeSonataModular/Button/list_button.html.twig',
                    'pager_links'         => '@SherlockodeSonataModular/Pager/links.html.twig',
                    'search_result_block' => '@SherlockodeSonataModular/Block/block_search_result.html.twig',
                    'list_block'          => '@SherlockodeSonataModular/Block/block_admin_list.html.twig',
                ],
                'assets'    => [
                    'stylesheets' => [
                        'bundles/sonatacore/vendor/components-font-awesome/css/font-awesome.min.css',
                        'bundles/sonatacore/vendor/ionicons/css/ionicons.min.css',
                        'bundles/sonataadmin/vendor/admin-lte/dist/css/AdminLTE.min.css',
                        'bundles/sonataadmin/vendor/admin-lte/dist/css/skins/skin-black.min.css',
                        'bundles/sonatacore/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
                        'bundles/sonatacore/vendor/select2/select2.css',
                        'bundles/sonatacore/vendor/select2-bootstrap-css/select2-bootstrap.min.css',
                        'bundles/sonataadmin/vendor/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css',
                        'bundles/sonataadmin/css/tree.css',
                        'bundles/sherlockodesonatamodular/css/vendor.css',
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

            if (isset($bundleConfiguration['color'])) {
                switch ($bundleConfiguration['color']) {
                    case 'blue':
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/app-blue.css';
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/style-blue.css';
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/icheck/blue.css';
                        break;
                    case 'orange':
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/app-orange.css';
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/style-orange.css';
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/icheck/orange.css';

                        break;
                    case 'purple':
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/app-purple.css';
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/style-purple.css';
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/icheck/purple.css';

                        break;
                    case 'red':
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/app-red.css';
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/style-red.css';
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/icheck/red.css';

                        break;
                    case 'seagreen':
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/app-seagreen.css';
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/style-seagreen.css';
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/icheck/seagreen.css';

                        break;
                    default:
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/app.css';
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/style-green.css';
                        $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/icheck/green.css';

                        break;
                }
            } else {
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/app.css';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/style-green.css';
                $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/icheck/green.css';
            }

            $config['assets']['stylesheets'][] = 'bundles/sherlockodesonatamodular/css/style.css';

            $container->prependExtensionConfig('sonata_admin', $config);

            $bundles = $container->getParameter('kernel.bundles');
            if (isset($bundles['SonataAdminBundle'])) {
                $config = [
                    'templates' => [
                        'form' => ['@SherlockodeSonataModular/Form/form_admin_fields.html.twig'],
                    ],
                ];

                $container->prependExtensionConfig('sonata_doctrine_orm_admin', $config);
            }
        }
    }
}
