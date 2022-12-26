<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'meta',
        'name',
    ];

    public function getMetaAttribute($value)
    {
        return json_decode($value);
    }
}
