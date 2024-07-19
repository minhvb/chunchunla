<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eat extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'milk_type',
        'amount',
        'date',
        'start',
        'end',
        'fed_by',
    ];
}
