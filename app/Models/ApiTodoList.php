<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiTodoList extends Model
{
    use HasFactory;
    protected $table = 'todolists';
    protected $primaryKey = 'id';
    protected $timestamp = true;

    protected $fillable = [
        'content',
    ];
}
