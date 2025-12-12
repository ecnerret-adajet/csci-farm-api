<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Farm;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cluster extends Model
{
    use SoftDeletes;

    protected $table = 'clusters';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'farm_id',
    ];

    protected $rules = [
        'name' => 'required|string',
        'farm_id' => 'required|integer',
    ];

    // Validation message
    protected $messages = [
        'name.required' => 'Cluster name is required',
        'name.string' => 'Cluster name must be a string',
        'farm_id.required' => 'Farm ID is required',
        'farm_id.integer' => 'Farm ID must be an integer',
    ];

    public function farm()
    {
        return $this->belongsTo(Farm::class)->select('id', 'name');
    }
}
