<?php

namespace App\JsonApi\HandbookDirectionTypes;

use App\Models\HandbookDirectionType;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    /**
     * @var string
     */
    protected $resourceType = 'handbook-direction-types';

    /**
     * @param HandbookDirectionType $resource
     * the domain record being serialized
     *
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param HandbookDirectionType $resource
     * the domain record being serialized
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'name' => $resource->name,
        ];
    }
}
