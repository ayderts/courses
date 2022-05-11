<?php

namespace App\JsonApi\Courses;

use App\Models\Course;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    /**
     * @var string
     */
    protected $resourceType = 'courses';

    /**
     * @param Course $resource
     * the domain record being serialized
     *
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Course $resource
     * the domain record being serialized
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'erp_id' => $resource->erp_id,
            'name' => $resource->name,
            'description' => $resource->description,
            'price' => $resource->price,
            'date_from' => $resource->date_from,
            'date_to' => $resource->date_to,
            'duration' => $resource->duration,
            'image_url' => $resource->image_url_path,
            'course_type' => $resource->course_type,  // сделать для них справочники, если не получиться из констант вытащить список
            'study_type' => $resource->study_type,
            'currency' => $resource->currency,
            'has_certificate' => $resource->has_certificate,
            'homework_number' => $resource->homework_number,
            'test_number' => $resource->test_number,
            'position' => $resource->position,
            'created_at' => $resource->created_at,
            'updated_at' => $resource->updated_at,
        ];
    }

    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'handbook-direction-type' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
        ];
    }
}
