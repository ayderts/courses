<?php

namespace App\JsonApi\Lessons;

use App\Models\Lesson;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    /**
     * @var string
     */
    protected $resourceType = 'lessons';

    /**
     * @param Lesson $resource
     * the domain record being serialized
     *
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Lesson $resource
     * the domain record being serialized
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'name' => $resource->name,
            'lesson_description' => $resource->lesson_description,
            'date' => $resource->date,
            'time_from' => $resource->time_from,
            'time_to' => $resource->time_to,
            'video_url' => $resource->video_url ?? "",
            'position' => $resource->position,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }

    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'course_program' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
            'prev-lesson' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ]
        ];
    }
}
