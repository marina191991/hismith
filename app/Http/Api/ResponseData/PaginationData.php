<?php

namespace App\Http\Api\ResponseData;

use Illuminate\Contracts\Support\Arrayable;

class PaginationData implements Arrayable
{
    public function __construct(public ?int $limit, public ?int $offset, public int $total)
    {
    }

    public function toArray(): array
    {
        return [
            'limit' => $this->limit,
            'offset' => $this->offset,
            'total' => $this->total,
        ];
    }
}
