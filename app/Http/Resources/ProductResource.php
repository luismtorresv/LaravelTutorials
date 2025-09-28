<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(), // @phpstan-ignore method.notFound
            'name' => $this->getName(), // @phpstan-ignore method.notFound
            'price' => $this->getPrice(), // @phpstan-ignore method.notFound
        ];
    }
}
