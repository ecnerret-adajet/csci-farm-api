<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use SoftDeletes;

    protected $table = 'attendances';
    protected $date = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'date',
        'field_id',
        'status',
        'remarks',
        'image_url'
    ];

    protected $rules = [
        'user_id' => 'required',
        'date' => 'required',
        'field_id' => 'required',
        'status' => 'nullable',
        'remarks' => 'nullable',
        'image_url' => 'required'
    ];

    protected $messages = [
        'user_id.required' => 'User ID is required.',
        'date.required' => 'Date is required.',
        'field_id.required' => 'Field ID is required.',
        'image_url.required' => 'Image URL is required.'
    ];

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
