<?php

namespace App\DTOs;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class DtoUsers
{
    public int $perPage;

    private function __construct(int $perPage)
    {
        $this->perPage = $perPage;
    }

    public static function fromRequest(Request $request): self
    {
        $validator = Validator::make($request->all(), [
            'per_page' => ['sometimes', 'integer', 'min:1', 'max:100'],
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $validated = $validator->validated();

        return new self(
            $validated['per_page'] ?? 10
        );
    }
}
