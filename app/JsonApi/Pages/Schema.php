<?php

namespace App\JsonApi\Pages;

use App\Models\Page;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    /**
     * @var string
     */
    protected $resourceType = 'pages';

    /**
     * @param Page $resource
     *                              the domain record being serialized
     *
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Page $resource
     *                              the domain record being serialized
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'title' => $resource->title,
            'content' => $resource->content,
            'image_uri' => $resource->image_uri,
            'files' => $resource->files,
            'seo_title' => $resource->seo_title,
            'seo_description' => $resource->seo_description,
            'seo_image' => $resource->seo_image,
            'seo_slug' => $resource->seo_slug,
        ];
    }
}
