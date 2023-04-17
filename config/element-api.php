<?php

use craft\elements\Entry;
use craft\commerce\elements\Product;
use craft\helpers\UrlHelper;
use aelvan\imager\services\ImagerService;

return [
    'endpoints' => [
        'api/magazin/entries.json' => function() {
            return [
                'elementType' => Entry::class,
                //'cache' => false,
                'pretty' => true,
                'elementsPerPage' => 25,
                'criteria' => [
                    'section' => 'magazin',
                    'site' => 'magazin',
                ],
                'transformer' => function(Entry $entry) {
                    $kategorien = [];
                    foreach ($entry->kategorie as $kategorie) {
                        $kategorien[] = $kategorie->title;
                    };
                    $sparten = [];
                    foreach ($entry->division as $division) {
                        $sparten[] = $division->title;
                    };
                    $cover = [];
                    foreach ($entry->cover->all() as $covers) {
                        $cover[] = $covers->url;
                    };
                    $buehnenbild = [];
                    foreach ($entry->titlestoryCover->all() as $buehnenbilder) {
                        $buehnenbild[] = $buehnenbilder->url;
                    }
                    return [
                        'title' => $entry->title,
                        'date' => $entry->postDate,
                        'url' => $entry->url,
                        'jsonUrl' => UrlHelper::url("api/magazin/{$entry->id}.json"),
                        'dachzeile' => $entry->dachzeile,
                        'description' => $entry->intro,
                        'slug' => $entry->slug,
                        'ausgabe' => [
                            'ausgabe' => isset($entry->ausgabeEintrag->one()->title) ? $entry->ausgabeEintrag->one()->title : null,
                            'ausgabe URL' => isset($entry->ausgabeEintrag->one()->url) ? $entry->ausgabeEintrag->one()->url : null,
                        ],
                        'sammlung' => $entry->sammlung->label,
                        //'kategorie' => $entry->kategorie->one(),
                        'kategorie(n)' => $kategorien,
                        //'sparte' => $sparten,
                        'sparte(n)' => $entry->division->one(),
                        'cover' => $cover,
                        'coverparsed' => $entry->coverParsed,
                        'bühnenbild' => $buehnenbild,
                        'text' => [
                            'text 1' => $entry->text,
                            'text 2' => $entry->text2,
                            'text 3' => $entry->text3,
                        ],
                        'infoboxen' => [
                            'infobox 1' => $entry->infobox,
                            'infobox 2' => $entry->infobox2,
                            'infobox 3' => $entry->infobox3,
                        ],
                        'videos' => [
                            'video 1' => $entry->video1,
                            'video 2' => $entry->video2,
                            'video 3' => $entry->video3,
                        ],
                        
                        'layout' => [
                            'small' => $entry->small,
                            'medium' => $entry->medium,
                            'large' => $entry->large,
                        ],
                        'galerieposition' => $entry->galerieposition,
                        'colorcode title' => $entry->colorcodeTitle,
                        'colorcode hex' => (string)$entry->colorcodeHex,
                        'LesezeitB' => (int)$entry->lesezeitB,
                        //'Next Entry' => $entry->nextEntry->one()->sectionId,
                        //'Previous Entry' => $entry->previousEntry->one()->editable,
                        'Ausgabe' => substr($entry->ausgabeUrl,23,6),
                        //'Ausgabe Seg' => explode('/', $entry->ausgabeUrl)[2],
                        // 'Entry ID' => $entry->id,
                        'UID (Plone)' => $entry->uidPlone,
                        //'UID (Craft)' => $entry->uid,
                        //'jsonUrl' => UrlHelper::url("api/magazin/{$entry->id}.json"),
                        //'summary' => $entry->summary,
                    ];
                },
            ];
        },
        'api/magazin/<entryId:\d+>.json' => function($entryId) {
            return [
                'elementType' => Entry::class,
                //'cache' => false,
                'pretty' => true,
                'criteria' => [
                    'id' => $entryId,
                    'section' => 'magazin',
                    'site' => 'magazin',
                ],
                'one' => true,
                'transformer' => function(Entry $entry) {
                    $kategorien = [];
                    foreach ($entry->kategorie as $kategorie) {
                        $kategorien[] = $kategorie->title;
                    };
                    $sparten = [];
                    foreach ($entry->division as $division) {
                        $sparten[] = $division->title;
                    };
                    $cover = [];
                    foreach ($entry->cover->all() as $covers) {
                        $cover[] = $covers->url;
                    };
                    $buehnenbild = [];
                    foreach ($entry->titlestoryCover->all() as $buehnenbilder) {
                        $buehnenbild[] = $buehnenbilder->url;
                    }
                    return [
                        'title' => $entry->title,
                        'date' => $entry->postDate,
                        'url' => $entry->url,
                        'dachzeile' => $entry->dachzeile,
                        'description' => $entry->intro,
                        'autor' => $entry->autoren,
                        'slug' => $entry->slug,
                        'ausgabe' => [
                            'ausgabe' => isset($entry->ausgabeEintrag->one()->title) ? $entry->ausgabeEintrag->one()->title : null,
                            'ausgabe url' => isset($entry->ausgabeEintrag->one()->url) ? $entry->ausgabeEintrag->one()->url : null,
                        ],
                        'sammlung' => $entry->sammlung->label,
                        //'kategorie' => $entry->kategorie->one(),
                        'kategorie(n)' => $kategorien,
                        //'sparte' => $sparten,
                        'sparte(n)' => $entry->division->one(),
                        'cover' => $cover,
                        'bühnenbild' => $buehnenbild,
                        'text' => [
                            'text 1' => $entry->text,
                            'text 2' => $entry->text2,
                            'text 3' => $entry->text3,
                        ],
                        'infoboxen' => [
                            'infobox 1' => $entry->infobox,
                            'infobox 2' => $entry->infobox2,
                            'infobox 3' => $entry->infobox3,
                        ],
                        'videos' => [
                            'video 1' => $entry->video1,
                            'video 2' => $entry->video2,
                            'video 3' => $entry->video3,
                        ],
                        
                        'layout' => [
                            'small' => $entry->small,
                            'medium' => $entry->medium,
                            'large' => $entry->large,
                        ],
                        'galerieposition' => $entry->galerieposition,
                        'colorcode title' => $entry->colorcodeTitle,
                        'colorcode hex' => (string)$entry->colorcodeHex,
                        //'Next Entry' => $entry->nextEntry->one()->sectionId,
                        //'Previous Entry' => $entry->previousEntry->one()->editable,
                        //'Ausgabe' => substr($entry->ausgabeUrl,23,6),
                        //'Ausgabe Seg' => explode('/', $entry->ausgabeUrl)[2],
                        // 'Entry ID' => $entry->id,
                        'UID (Plone)' => $entry->uidPlone,
                        //'UID (Craft)' => $entry->uid,
                        //'jsonUrl' => UrlHelper::url("api/magazin/{$entry->id}.json"),
                        //'summary' => $entry->summary,
                    ];
                },
            ];
        },
        'api/products.json' => function() {
            $categoryIds = [];
            $relatedParam = ['and'];
            $suchtext = Craft::$app->getRequest()->getParam('suchtext');
            $categoryIds = Craft::$app->getRequest()->getQueryParam('categoryIds');
            if(!empty($categoryIds)) {
                // $strings_array = explode(',', $categoryIds);
                // foreach ($strings_array as $each_number) {
                //     $result_array[] = (int) $each_number;
                // }
                $result = array_merge($relatedParam, $categoryIds);
                $criteria = [
                    'search' => ($suchtext),
                    'relatedTo' => ['targetElement' => $result],
                    'orderBy' => 'score',
                    'limit' => 10,
                ];
            }
            else {
                $result = NULL;
                $criteria = [
                    'search' => ($suchtext),
                    'orderBy' => 'score',
                    'limit' => 10,
                ];
            }
            return [
                'elementType' => Product::class,
                'cache' => false,
                'criteria' => $criteria,
                'elementsPerPage' => 10,
                'transformer' => function(Product $product) {
                    $themen = [];
                     foreach ($product->themenMedienportal as $thema) {
                        $themen[] = $thema->title . ' ' . $thema->id;
                    }
                    $branchen = [];
                     foreach ($product->branchen as $branche) {
                        $branchen[] = $branche->title . ' ' . $branche->id;
                    }
                    $medienarten = [];
                     foreach ($product->medienart as $medienart) {
                        $medienarten[] = $medienart->title . ' ' . $medienart->id;
                    }
                    $zielgruppen = [];
                     foreach ($product->zielgruppen as $zielgruppe) {
                        $zielgruppen[] = $zielgruppe->title . ' ' . $zielgruppe->id;
                    }
                    
                    if (strlen($product->medienportalTitelbild->one()) > 0){
                        $imager = new aelvan\imager\services\ImagerService();
                        $image  = $product->medienportalTitelbild->one();
                        $cover  = $imager->transformImage($image, [
                            'width' => 141,
                            'format'=> 'webp',
                        ])->url;
                        //$cover = $product->medienportalTitelbild->one()->url;
                        //$cover = Craft::$plugin->imager->transformImage($product->medienportalTitelbild->one(), ['width' => 100]);
                    } else {
                        $cover = '/imager/bildermedienportal/15178/gbo_0ab9dfa522144526d524ebab9b81d93b.webp';
                    }
                    $slug = strval($product->slug);
                    return [
                        'title' => $product->title,
                        'purchasableId' => $product->defaultVariantId,
                        'cover' => $cover,
                        'description' => $product->description,
                        'stock' => $product->defaultVariant->stock,
                        //'slug' => $product->ploneSlug,
                        'uri' => '/artikel/' . $product->ploneSlug,
                        'sku' => $product->defaultVariant->sku,
                        //'url' => $product->url,
                        //'slug' => $product->slug,
                        //'cover Parsed' => $entry->coverParsed,
                        //'Sammlung' => $entry->sammlung,
                        //'cover' => $entry->cover->one(),
                        //'Date' => $product->postDate,
                        //'Entry ID' => $product->id,
                        //'UID' => $product->uid,
                        //'UID Plone' => $product->uidPlone,
                        //'stock' => strval(rand(0,10)),
                        //'stocknew' => $product->defaultVariant->stock,
                        //'sku' => $product->defaultVariant->sku,
                        //'sku' => $product->defaultVariant->stock,
                        //'price' => 2,
                        //'available' => strval(1),
                        //'Suchtext' => (Craft::$app->request->getQueryParam('suchtext')),
                        'Themen' =>  $themen,
                        'Branchen' =>  $branchen,
                        'Medienart' =>  $medienarten,
                        'Zielgruppen' =>  $zielgruppen,
                        //'cats' => $result_array,
                        //'CAT' => var_dump($category->id),
                        //'available' => strval(1),
                        //'available2' => strval(rand(0,1)),
                        //'stock' => $product->defaultVariant->stock,
                        // 'unlimitetd' => $product->defaultVariant->hasUnlimitedStock,
                        // 'stock' => $product->defaultVariant->stock,
                    ];
                },
            ];
        },
    ]
];