<?php

namespace Anonimatrix\PageEditor\Services;

use Anonimatrix\PageEditor\Support\Facades\Models\PageModel;
use Illuminate\Support\Facades\Route;

class KnowledgeService
{
    /**
     * Set the routes for the knowledge editor.
     */
    public static function setEditorRoute()
    {
        Route::get('knowledge-editor/{id?}', \Anonimatrix\PageEditor\Components\Wiki\Forms\ArticlePageContentForm::class)->name('knowledge.editor');
    }

    /**
     * Set route for the raw list of articles. Used for admin purposes.
     */
    public static function setRawListRoute()
    {
        Route::get('knowledge-list', \Anonimatrix\PageEditor\Components\Wiki\ArticleRawList::class)->name('knowledge.list');
    }

    /**
     * Set the routes for the articles. We have two routes:
     * 1. The articles list route and the article page route
     * 2. The what's new route
     */
    public static function setArticlesRoute()
    {
        Route::get('knowledge-articles/whats-new', \Anonimatrix\PageEditor\Components\Wiki\ArticlePage::class)->name('knowledge.whats-new');
        Route::get('knowledge-articles/{id?}', \Anonimatrix\PageEditor\Components\Wiki\ArticlePage::class)->name('knowledge.articles');
    }

    public static function getCurrentRouteArticle()
    {
        $route = request()->route()->getName();

        return PageModel::where('associated_route', $route)->where('associated_route', '!=', 'knowledge.whats-new')->where('group_type', 'knowledge')->first();
    }
}
