<?php

namespace Anonimatrix\PageEditor\Cms\ItemTypes;

use Anonimatrix\PageEditor\Models\PageItem;
use Anonimatrix\PageEditor\Cms\PageItemType;

class HeaderItem extends PageItemType
{
    public const ITEM_TAG = 'div';
    public const ITEM_NAME = 'header';
    public const ITEM_TITLE = 'newsletter.image-header';
    public const ITEM_DESCRIPTION = 'newsletter.full-screen-top-of-page-image';

    public function __construct(PageItem $pageItem, $interactsWithPageItem = true)
    {
        parent::__construct($pageItem, $interactsWithPageItem);

        $this->content = (object) [
            'image' => $pageItem->image,
            'title' => $pageItem->title,
        ];
    }

    public function blockTypeEditorElement()
    {
        $imgEl = _Image('newsletter.image')
            ->name($this->nameImage, $this->interactsWithPageItem);

        $inputEl = _Translatable('campaign.title-optional')
            ->name($this->nameTitle, $this->interactsWithPageItem);

        if($this->valueTitle) $inputEl = $inputEl->default(json_decode($this->valueTitle));
        if($this->valueImage) $imgEl = $imgEl->default($this->valueImage);

       return _Rows(
            $imgEl,
            $inputEl,
        );
    }

    protected function toElement()
    {
      return _Rows(
        !$this->content->image ? null :
            _Img()
                ->src(\Storage::url($this->content->image['path']))
                ->class('h-60 w-full')
                ->bgCover(),
            _FlexCenter(
                _Html($this->content->title)->class('text-inherit text-center'),
            )
        );
    }

    public function toHtml(): string
    {
        $imageUrl = $this->content?->image;
        if (!$imageUrl) {
            return '';
        }

        $imageUrl = \Storage::disk('public')->url($this->content->image['path']);

        return $this->openCloseTag("
            <img src=\"{$imageUrl}\" style=\"background-size:cover;width:100%;height:auto\" />
            <div style=\"display: flex; justify-content:center;\">
                <div style=\"color: white; text-align: center; font-size: 1.5rem;\">{$this->content->title}</div>
            </div>
        ");
    }
}
