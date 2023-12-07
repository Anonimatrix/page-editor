<?php

namespace Anonimatrix\PageEditor\Cms\ItemTypes;

use Anonimatrix\PageEditor\Models\PageItem;
use Anonimatrix\PageEditor\Cms\PageItemType;

class H1Item extends PageItemType
{
    public const ITEM_TAG = 'h1';
    public const ITEM_NAME = 'h1';
    public const ITEM_TITLE = 'newsletter.page-title-h1';
    public const ITEM_DESCRIPTION = 'newsletter.there-should-be-only-one-per-page!';

    public function __construct(PageItem $pageItem, $interactsWithPageItem = true)
    {
        parent::__construct($pageItem, $interactsWithPageItem);

        $this->content = $pageItem->title ?: '';
    }

    public function blockTypeEditorElement()
    {
        $item = _Translatable('campaign.title')->name($this->nameTitle, $this->interactsWithPageItem);

        if($this->valueTitle) $item = $item->default(json_decode($this->valueTitle));

       return $item;
    }

    protected function toElement()
    {
        return _Html($this->content);
    }

    public function toHtml(): string
    {
        return $this->openCloseTag();
    }

    public function defaultClasses($pageItem): string
    {
        $classes = parent::defaultClasses($pageItem);
        $classes .= ' text-align ';

        return $classes;
    }

    public function defaultStyles($pageItem): string
    {
        $styles = parent::defaultStyles($pageItem);
        $styles .= 'text-align: center;';

        if($pageItem->getTitleColor()) $styles .= 'color: ' . $pageItem->getTitleColor() . ';';

        return $styles;
    }
}
