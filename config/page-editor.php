<?php

return [
    'default_page_group_type' => 'newsletter',
    
    'models' => [
        'page' => \Anonimatrix\PageEditor\Models\Page::class,
        'page_item' => \Anonimatrix\PageEditor\Models\PageItem::class,
        'page_item_style' => \Anonimatrix\PageEditor\Models\PageItemStyle::class,
    ],

    'components' => [
        'page-item-styles-form' => \Anonimatrix\PageEditor\Components\Cms\StylePageItemForm::class,
        'page-content-form' => \Anonimatrix\PageEditor\Components\Cms\PageContentForm::class,
        'page-info-form' => \Anonimatrix\PageEditor\Components\Cms\PageInfoForm::class,
        'page-design-form' => \Anonimatrix\PageEditor\Components\Cms\PageDesignForm::class,
        'page-item-form' => \Anonimatrix\PageEditor\Components\Cms\PageItemForm::class,
        'page-preview' => \Anonimatrix\PageEditor\Components\Cms\PagePreview::class,
        'page-style-form' => \Anonimatrix\PageEditor\Components\Cms\PageStylingForm::class,
    ],

    'types' => [
        \Anonimatrix\PageEditor\Items\ItemTypes\H1Item::class,
        \Anonimatrix\PageEditor\Items\ItemTypes\NumberLineItem::class,
        \Anonimatrix\PageEditor\Items\ItemTypes\H2Item::class,
        \Anonimatrix\PageEditor\Items\ItemTypes\ImgItem::class,
        \Anonimatrix\PageEditor\Items\ItemTypes\VideoItem::class,
        \Anonimatrix\PageEditor\Items\ItemTypes\CKItem::class,
        \Anonimatrix\PageEditor\Items\ItemTypes\ButtonItem::class,
        \Anonimatrix\PageEditor\Items\ItemTypes\KompoItem::class,
        \Anonimatrix\PageEditor\Items\ItemTypes\BoxedContentItem::class,
        \Anonimatrix\PageEditor\Items\ItemTypes\OtherPageItem::class,
        \Anonimatrix\PageEditor\Items\ItemTypes\ElementType1Item::class,
        \Anonimatrix\PageEditor\Items\ItemTypes\WhatsNewCardItem::class,
        \Anonimatrix\PageEditor\Items\ItemTypes\ScribeItem::class,
    ],

    'hidden_types' => [ // Won't be displayed, but it will work in groups
        \Anonimatrix\PageEditor\Items\ItemTypes\H2Item::class,
    ],

    'features' => [
        'teams' => true,
        'editor_variables' => true,
    ],

    'teams' => [
        'model' => \App\Models\Teams\Team::class,
    ],

    'default_font_family' => "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'",

    'automapping_styles' => [
        'padding-top' => 'px',
        'padding-bottom' => 'px',
        'padding-left' => 'px',
        'padding-right' => 'px',

        'margin-top' => 'px',
        'margin-bottom' => 'px',
        'margin-left' => 'px',
        'margin-right' => 'px',
        
        'padding-top-mobile' => 'px',
        'padding-bottom-mobile' => 'px',
        'padding-left-mobile' => 'px',
        'padding-right-mobile' => 'px',

        'margin-top-mobile' => 'px',
        'margin-bottom-mobile' => 'px',
        'margin-left-mobile' => 'px',
        'margin-right-mobile' => 'px',

        'font-size' => 'px',
        'color' => ' !important',
        'background-color' => '',
        'text-align' => '',

        'link-color' => '',

        'height' => 'px',
        'width' => 'px',

        'height-auto' => '',

        'min-width' => 'px',
        'max-width' => '%',

        'img-height' => 'px',
        'img-width' => 'px',
        'img-max-width' => '%',

        'align-items' => '',

        'bg-number-color' => '',
        'font-size-number' => 'px',
        'bg-size-number' => 'px',

        'preset-color' => '',

        'border-radius' => 'px',
        'img-border-radius' => 'px',

        'border-color' => '',
        'border-top-width' => 'px',
        'border-bottom-width' => 'px',
        'border-left-width' => 'px',
        'border-right-width' => 'px',
    ],

    'boxed_content' => [
        'gray' => [
            'background-color' => '#f5f5f5',
            'color' => '#000000',
            'border-color' => '#d5d5d5',
            'label' => 'cms::cms.gray',
        ],
        'blue' => [
            'background-color' => '#e6f7ff',
            'color' => '#000000',
            'border-color' => '#98cde5',
            'label'=> 'cms::cms.blue',
        ],
        'green' => [
            'background-color' => '#f0fff0',
            'color' => '#000000',
            'border-color' => '#c6dfc6',
            'label' => 'cms::cms.green',
        ],
        'yellow' => [
            'background-color' => '#ffffe6',
            'color' => '#000000',
            'border-color' => '#ffffcc',
            'label' => 'cms::cms.yellow',
        ],
        'red' => [
            'background-color' => '#ffe6e6',
            'color' => '#000000',
            'border-color' => '#ffcccc',
            'label' => 'cms::cms.red',
        ],
    ],
];
