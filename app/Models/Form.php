<?php

namespace App\Models;

use App\Models\FormField;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function formFields()
    {
        return $this->hasMany(FormField::class);
    }
}
