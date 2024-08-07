<?php

namespace App\Models;

use App\Models\Form;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FormSubmission extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
