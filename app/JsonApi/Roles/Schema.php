<?php

namespace App\JsonApi\Roles;

use Neomerx\JsonApi\Schema\SchemaProvider;
use TCG\Voyager\Models\Role;

class Schema extends SchemaProvider
{
    /**
     * @var string
     */
    protected $resourceType = 'roles';

    /**
     * @param Role $resource
     * the domain record being serialized
     *
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Role $resource
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
