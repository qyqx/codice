<?php

namespace Codice\Http\Controllers;

use Codice\Plugins\Manager;
use Redirect;
use View;

class PluginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Displays listing of plugins.
     *
     * GET /plugins (as plugins)
     */
    public function getIndex()
    {
        $manager = Manager::instance();

        $allPlugins = $manager->getAllPlugins();

        $plugins = [];
        foreach ($allPlugins as $identifier) {
            $plugins[$identifier] = [
                'details' => $manager->pluginDetails($identifier),
                'state' => $manager->isInstalled($identifier)
                    ? ($manager->isEnabled($identifier) ? 'enabled' : 'disabled')
                    : 'not-installed',
            ];
        }

        return View::make('plugin.index', [
            'plugins' => $plugins,
            'title' => trans('plugin.index.title'),
        ]);
    }

    /**
     * Enables single plugin.
     *
     * GET /plugin/{id}/enable (as plugin.enable)
     */
    public function getEnable($id)
    {
        Manager::instance()->enable($id);

        return Redirect::route('plugins')->with('message', trans('plugin.success.enable'));
    }

    /**
     * Disables single plugin.
     *
     * GET /plugin/{id}/disable (as plugin.disable)
     */
    public function getDisable($id)
    {
        Manager::instance()->disable($id);

        return Redirect::route('plugins')->with('message', trans('plugin.success.disable'));
    }

    /**
     * Installs single plugin.
     *
     * GET /plugin/{id}/install (as plugin.install)
     */
    public function getInstall($id)
    {
        $status = Manager::instance()->install($id);

        return Redirect::route('plugins')
                ->with('message', trans($status ? 'plugin.success.install' : 'plugin.error.requirements'))
                ->with('message_type', $status ? 'info' : 'danger');
    }

    /**
     * Removes single plugin.
     *
     * GET /plugin/{id}/uninstall (as plugin.uninstall)
     */
    public function getUninstall($id)
    {
        Manager::instance()->uninstall($id);

        return Redirect::route('plugins')->with('message', trans('plugin.success.uninstall'));
    }
}
