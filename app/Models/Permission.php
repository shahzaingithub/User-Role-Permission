<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Attributes\SearchUsingPrefix;
class Permission extends Model
{
    use HasFactory,Searchable;

    #[SearchUsingFullText(['bio'])]
    #[SearchUsingPrefix(['id', 'name'])]
    public function toSearchableArray():array
    {
        return [
            'name' => $this->name
        ];
    }
}
