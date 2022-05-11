<?php

namespace App\JsonApi\Materials;

use App\Models\Material;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    /**
     * @var string
     */
    protected $resourceType = 'materials';

    /**
     * @param Material $resource
     * the domain record being serialized
     *
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Material $resource
     * the domain record being serialized
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'name' => $resource->name,
            'description' => $resource->description,
            'file_url' => $resource->file_url_path,
            'file_type' => $resource->file_type,
            'file_type_color' => $resource->file_type_color,
            'position' => $resource->position,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }

    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'lesson' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
        ];
    }
}
