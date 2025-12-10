<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FarmActivity;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FarmActivityLog extends Model
{
    use SoftDeletes;

    protected $table = 'farm_activity_logs';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'farm_activity_id',
        'user_id',
        'date',
        'mandays_accomplished',
        'image_url',
        'remarks'
    ];

    protected $rules = [
        'farm_activity_id' => 'required',
        'user_id' => 'required',
        'date' => 'required',
        'mandays_accomplished' => 'required',
        'image_url' => 'required',
        'remarks' => 'nullable'
    ];

    protected $messages = [
        'farm_activity_id.required' => 'The farm activity is required.',
        'user_id.required' => 'The user is required.',
        'date.required' => 'The date is required.',
        'mandays_accomplished.required' => 'The mandays accomplished is required.',
        'image_url.required' => 'The image URL is required.'
    ];

    public function farmActivity()
    {
        return $this->belongsTo(FarmActivity::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
