<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = ['question'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
