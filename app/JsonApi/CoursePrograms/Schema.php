<?php

namespace App\JsonApi\CoursePrograms;

use App\Models\CourseProgram;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    /**
     * @var string
     */
    protected $resourceType = 'course-programs';

    /**
     * @param CourseProgram $resource
     * the domain record being serialized
     *
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param CourseProgram $resource
     * the domain record being serialized
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'name' => $resource->name,
            'description' => $resource->description,
            'position' => $resource->position,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }

    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'course' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
            'coach' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
        ];
    }
}
