<?php

namespace App\JsonApi\Users;

use App\Models\User;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    /**
     * @var string
     */
    protected $resourceType = 'users';

    /**
     * @param User $resource
     * the domain record being serialized
     *
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param User $resource
     * the domain record being serialized
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'name' => $resource->name ??  '',
            'email' => $resource->email ?? '',
            'first_name' => $resource->first_name ?? '',
            'last_name' => $resource->first_name ?? '',
            'fathers_name' => $resource->first_name ?? '',
            'phone' => $resource->phone ?? '',
            'occupation' => $resource->occupation ?? '',
            'birth_date' => $resource->birth_date ?? '',
            'gender' => $resource->gender ?? '',  // берется из constants
            'is_active_notification' => $resource->is_active_notification ?? false,
        ];
    }

    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'location-city' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::SHOW_DATA => isset($includeRelationships['location-city']),
                self::DATA => function () use ($resource) {
                    return $resource->locationCity;
                },
            ],
            'location-country' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
            'role' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
        ];
    }
}
