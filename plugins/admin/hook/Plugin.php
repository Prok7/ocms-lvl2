<?php namespace Admin\Hook;

use Backend;
use System\Classes\PluginBase;
use Admin\School\Models\Student;
use Flash;

/**
 * Hook Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Hook',
            'description' => 'No description provided yet...',
            'author'      => 'Admin',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        // hook on student's arrival create
        Student::extend(function($model) {
            $model->bindEvent("model.afterSave", function() use ($model) {
                Flash::success($model->created_at);
            });
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Admin\Hook\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'admin.hook.some_permission' => [
                'tab' => 'Hook',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'hook' => [
                'label'       => 'Hook',
                'url'         => Backend::url('admin/hook/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['admin.hook.*'],
                'order'       => 500,
            ],
        ];
    }
}
