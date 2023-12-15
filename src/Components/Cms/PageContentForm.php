<?php

namespace Anonimatrix\PageEditor\Components\Cms;

use Anonimatrix\PageEditor\Support\Facades\Models\PageModel;
use Anonimatrix\PageEditor\Support\Facades\PageEditor;
use Illuminate\Support\Facades\Route;
use Kompo\Form;

class PageContentForm extends Form
{
    public $id = 'page_content_form';
    protected $routeName;

    protected $withDesign = true;
    protected $prefixGroup = "";

    public function created(){
        $this->model(PageModel::find($this->modelKey()) ?? PageModel::make());
    }

    public function response()
    {
        return redirect()->route(request('route'), ['id' => $this->model->id]);
    }

    public function render()
    {
        return _Rows(
            _Card(
                _Hidden()->name('route', false)->value(Route::currentRouteName()),
                _Rows($this->inputs()),
                $this->extraInputs(),
                $this->submitMethod(),
            ),
            !$this->withDesign ? null : PageEditor::getPageDesignFormComponent($this->prefixGroup, $this->model?->id),
        );
    }

    protected function extraInputs()
    {
        return _Rows();
    }

    protected function inputs()
    {
        return [
            _Translatable('translate.page-editor.title')->name('title')->class('mb-2'),
        ];
    }

    protected function submitMethod()
    {
        return _SubmitButton('translate.page-editor.save')->class('mt-4');
    }
}
