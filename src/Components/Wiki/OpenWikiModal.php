<?php

namespace Anonimatrix\PageEditor\Components\Wiki;

use Anonimatrix\PageEditor\Models\Wiki\KnowledgePage;
use Kompo\Form;

class OpenWikiModal extends Form
{
    public $model = KnowledgePage::class;

    public function created()
    {
        $this->model(\Anonimatrix\PageEditor\Services\KnowledgeService::getCurrentRouteArticle());
    }

    public function render()
    {
        if(!$this->model->id) {
            return null;
        }

        $closeModalJs = '() => { document.querySelector("#wiki-help-modal").remove(); }';

        return _Rows(
            _Div(
                _Link()->icon('x')->run($closeModalJs)->class('absolute -top-2 -right-2 text-lg'),
            )->class('relative'),
            _Html('cms::wiki.help-title')->class('text-center text-2xl font-semibold pb-1'),
            _Html('cms::wiki.help-message')->class('text-center pb-3'),
            _Button('cms::wiki.go-to-help-page')->selfGet('getArticleWiki')->inDrawer()
                ->run($closeModalJs),
        )->id('wiki-help-modal')->class('fixed right-8 bottom-4 z-50 w-max h-max flex flex-col p-4 bg-white border border-gray-300 rounded-xl shadow-lg');
    }

    public function getArticleWiki()
    {
        return new \Anonimatrix\PageEditor\Components\Wiki\ArticlePage($this->model->id);
    }
}