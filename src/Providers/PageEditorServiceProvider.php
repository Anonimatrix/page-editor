<?php

namespace Anonimatrix\PageEditor\Providers;

use Anonimatrix\PageEditor\Features\EditorVariablesService;
use Anonimatrix\PageEditor\Features\TeamsService;
use Anonimatrix\PageEditor\Features\FeaturesService;
use Anonimatrix\PageEditor\PageEditorService;
use Anonimatrix\PageEditor\PageItemService;
use Anonimatrix\PageEditor\Styles\PageStyleService;
use Anonimatrix\PageEditor\Support\Facades\Features;
use Illuminate\Support\ServiceProvider;

class PageEditorServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadConfig();

        $this->loadCommands();

        $this->loadPublishes();
    }

    public function register(): void
    {
        $this->app->singleton('page-editor', function () {
            return new PageEditorService();
        });

        $this->app->singleton('page-item', function () {
            return new PageItemService();
        });

        $this->app->singleton('page-style-service', function () {
            return new PageStyleService();
        });

        $this->app->singleton('page-editor-features', function () {
            $featureService = new FeaturesService();

            collect(config('page-editor.features', []))
                ->each(function ($feature) use ($featureService) {
                    $featureService->addFeature($feature);
                });

            return $featureService;
        });

        $this->registerFeatures();

        $this->registerModels();
    }

    protected function registerModels()
    {
        $this->app->bind('page-model', function () {
            return new (config('page-editor.models.page'));
        });

        $this->app->bind('page-item-model', function () {
            return new (config('page-editor.models.page_item'));
        });

        $this->app->bind('page-item-style-model', function () {
            return new (config('page-editor.models.page_item_style'));
        });
    }

    protected function registerFeatures()
    {
        if (Features::hasFeature('teams')) {
            $this->app->singleton('page-editor-teams', function () {
                $teamsService = new TeamsService();

                $teamsService->setTeamClass();

                return $teamsService;
            });
        }

        if (Features::hasFeature('editor_variables')) {
            $this->app->singleton('page-editor-variables', function () {
                return new EditorVariablesService();
            });
        }
    }

    protected function loadCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                // Commands here
            ]);
        }
    }

    protected function loadConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/page-editor.php', 'page-editor');
    }

    protected function loadPublishes(): void
    {
        $this->publishes([
            __DIR__ . '/../../config/page-editor.php' => config_path('page-editor.php'),
            __DIR__ . '/../../database/migrations/' => database_path('migrations/page-editor'),
            __DIR__.'/../Models' => app_path('Models/PageEditor'),
        ], 'page-editor');
    }
}
