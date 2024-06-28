<?php

namespace App\Models;

use App\Models\Form;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormField extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $casts = [
        'options' => 'array',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
