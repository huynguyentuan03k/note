<?php
// File: app/Actions/GetListUsers.php

namespace App\Actions;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\QueryBuilder\QueryBuilder;

class GetListUsers
{
    public function handle(int $per_page = 10): LengthAwarePaginator
    {
        return QueryBuilder::for(User::class)
            ->allowedFilters(['role', 'email'])
            ->allowedSorts(['name', 'created_at'])
            ->defaultSort('-id')
            ->paginate($per_page);
    }
}
