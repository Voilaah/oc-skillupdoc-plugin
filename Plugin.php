<?php

namespace Voilaah\SkillupDoc;

use Event;
use Backend;
use System\Classes\PluginBase;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'MarkdownDocs',
            'description' => 'No description provided yet...',
            'author' => 'voilaah',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
    }

    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
        Event::listen("skillupdoc.docspath", fn() => plugins_path('voilaah/skillupdoc/docs/'));
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Voilaah\MarkdownDocs\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return [
            'voilaah.markdowndocs.docs' => [
                'tab' => 'MarkdownDocs',
                'label' => 'Access the documentation'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {

        return [
            'markdowndocs' => [
                'label' => 'Docs',
                'url' => Backend::url('voilaah/skillupdoc/docs'),
                'icon' => 'icon-book',
                'permissions' => ['voilaah.markdowndocs.*'],
                'order' => 500,
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'settings' => [
                'label' => 'Docs settings',
                'description' => 'Manage docs based settings.',
                'category' => 'Documentation',
                'icon' => 'icon-cog',
                'class' => \Voilaah\MarkdownDocs\Models\Settings::class,
            ]
        ];
    }

}
