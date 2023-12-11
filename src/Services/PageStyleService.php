<?php

namespace Anonimatrix\PageEditor\Services;

class PageStyleService
{
    public $automaticStyles = [
        'padding_top',
        'padding_bottom',
        'padding_left',
        'padding_right',

        'font_size',
        'color',
        'background_color',
    ];

    public function setStylesToModel($model)
    {
        foreach ($this->automaticStyles as $style) {
            $model->content->replaceProperty($style, request($style));
        }
    }
}