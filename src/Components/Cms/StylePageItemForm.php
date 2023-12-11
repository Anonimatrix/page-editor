<?php

namespace Anonimatrix\PageEditor\Components\Cms;

use Anonimatrix\PageEditor\Support\Facades\Models\PageItemStyleModel;
use Anonimatrix\PageEditor\Support\Facades\PageStyle;
use Kompo\Form;

class StylePageItemForm extends Form
{
    public function created()
    {
        $this->model(PageItemStyleModel::find($this->modelKey()) ?? PageItemStyleModel::make());
    }

    public function render()
    {
        $style = $this->model->content;

        return _Rows(
            _InputNumber('campaign.font-size')->name('font-size', false)->value($style->font_size)->class('mb-2'),
            _Input('campaign.background-color')->type('color')->value($style->background_color)->name('background-color', false)->class('mb-2'),
            _Columns(
                _Input('campaign.text-color')->type('color')->value($style->color)->name('color', false)->class('mb-2'),
            )->class('!mb-0'),
            _Card(
                _Html('campaign.custom-padding-and-styles')->class('text-sm font-semibold mb-4'),
                _Html('campaign.padding-px')->class('font-semibold text-sm mb-1'),
                _Columns(
                    _Input()->placeholder('campaign.top')->name('padding-top', false)->value($style->padding_top)->class('whiteField'),
                    _Input()->placeholder('campaign.right')->name('padding-right', false)->value($style->padding_top)->class('whiteField'),
                    _Input()->placeholder('campaign.bottom')->name('padding-bottom', false)->value($style->padding_top)->class('whiteField'),
                    _Input()->placeholder('campaign.left')->name('padding-left', false)->value($style->padding_top)->class('whiteField'),
                ),
                _Input()->placeholder('campaign.styles')
                    ->name('styles', false)
                    ->value((string) $style)
                    ->class('whiteField'),
                _Input()->placeholder('campaign.classes')->name('classes')->class('whiteField'),
            )->class('bg-gray-100 p-4'),
        );
    }
}