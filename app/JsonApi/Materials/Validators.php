<?php

namespace App\JsonApi\Materials;

use CloudCreativity\LaravelJsonApi\Validation\AbstractValidators;

class Validators extends AbstractValidators
{
    /**
     * @var string[]
     */
    protected $allowedPagingParameters = ['number', 'size'];

    /**
     * The include paths a client is allowed to request.
     *
     * @var string[]|null
     *                    the allowed paths, an empty array for none allowed, or null to allow all paths
     */
    protected $allowedIncludePaths = [];

    /**
     * The sort field names a client is allowed send.
     *
     * @var string[]|null
     *                    the allowed fields, an empty array for none allowed, or null to allow all fields
     */
    protected $allowedSortParameters = [];

    /**
     * The filters a client is allowed send.
     *
     * @var string[]|null
     *                    the allowed filters, an empty array for none allowed, or null to allow all
     */
    protected $allowedFilteringParameters = [
        'name',
    ];

    /**
     * Get resource validation rules.
     *
     * @param mixed|null $record
     *                           the record being updated, or null if creating a resource
     * @param array $data
     *                           the data being validated
     * @return array
     */
    protected function rules($record, array $data): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required',
            'file_type' => 'required',
        ];
    }

    /**
     * Get query parameter validation rules.
     */
    protected function queryRules(): array
    {
        return [
            'page.number' => 'filled|numeric|min:1',
            'page.size' => 'filled|numeric|between:1,100',
        ];
    }
}
