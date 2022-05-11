<?php

namespace App\JsonApi\ResponseMessages;

use App\Models\ResponseMessage;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    /**
     * @var string
     */
    protected $resourceType = 'response-messages';

    /**
     * @param ResponseMessage $resource
     * the domain record being serialized
     *
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param ResponseMessage $resource
     * the domain record being serialized
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'message' => $resource->message,
        ];
    }
}
