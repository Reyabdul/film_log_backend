<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\ControllerDoesNotReturnResponseException;

class Photo extends Model
{
    use HasFactory;

    public function collection()
    {
        return $this->belongsTo(Collection::class, 'collection_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
    
}