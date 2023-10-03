<?php

namespace App\Http\Common;

use App\Http\Api\ResponseData\PaginationData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class BaseIndexResponse extends JsonResponse
{
    abstract protected function getPluralResourceName(): string;

    public function __construct(ResourceCollection $resourceCollection, PaginationData $paginationData = null)
    {
        $data[$this->getPluralResourceName()] = $resourceCollection;

        if ($paginationData) {
            $data['pagination'] = $paginationData;
        }

        parent::__construct($data);
    }
}
