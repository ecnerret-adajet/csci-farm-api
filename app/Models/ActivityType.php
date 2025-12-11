<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityType extends Model
{
    use SoftDeletes;

    protected $table = 'activity_types';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
    ];

    // Validation message
    protected $rules = [
        'name' => 'required|string',
        'description' => 'nullable|string',
    ];

    protected $messages = [
        'name.required' => 'The name field is required.',
        'name.string' => 'The name field must be a string.',
        'description.string' => 'The description field must be a string.',
    ];
}
