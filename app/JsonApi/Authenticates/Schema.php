<?php

namespace App\JsonApi\Authenticates;

use Neomerx\JsonApi\Schema\SchemaProvider;
use App\Models\Authenticate;

class Schema extends SchemaProvider
{
    /**
     * @var string
     */
    protected $resourceType = 'authenticates';

    /**
     * @param Authenticate $resource
     * the domain record being serialized
     *
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Authenticate $resource
     * the domain record being serialized
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'token' => $resource->token,
        ];
    }
}
