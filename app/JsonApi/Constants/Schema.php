<?php

namespace App\JsonApi\Constants;

use App\Models\Constant;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    /**
     * @var string
     */
    protected $resourceType = 'constants';

    /**
     * @param Constant $resource
     * the domain record being serialized
     *
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param Constant $resource
     * the domain record being serialized
     *
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'study_types' => $resource->study_types,
            'course_types' => $resource->course_types,
            'currency' => $resource->currency,
            'file_types' => $resource->file_types,
            'gender' => $resource->gender,
            'languages' => $resource->languages,
            'coach_statuses' => $resource->coach_statuses,
        ];
    }
}
