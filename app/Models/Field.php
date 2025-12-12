<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cluster;
use App\Models\FarmActivityLog;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Field extends Model
{
    use SoftDeletes;

    protected $table = 'fields';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'cluster_id',
        'field_number',
        'area',
        'plant',
        'variety',
        'fan',
        'dopR',
        'assigned_to',
        'fertilizer'
    ];

    protected  $rules = [
        'cluster_id' => 'required|integer',
        'field_number' => 'required|string',
        'area' => 'required|string',
        'plant' => 'required|string',
        'variety' => 'required|string',
        'fan' => 'required|string',
        'dopR' => 'required|date',
        'assigned_to' => 'required|string',
        'fertilizer' => 'required|string',
    ];

    protected  $messages = [
        'cluster_id.required' => 'Cluster ID is required.',
        'field_number.required' => 'Field number is required.',
        'area.required' => 'Area is required.',
        'plant.required' => 'Plant is required.',
        'variety.required' => 'Variety is required.',
        'fan.required' => 'Fan is required.',
        'dopR.required' => 'DOPR is required.',
        'assigned_to.required' => 'Assigned to is required.',    
        'fertilizer.required' => 'Fertilizer is required.',
    ];

    public function cluster()
    {
        return $this->belongsTo(Cluster::class);
    }

    public function farmActivityLog(){
        return $this->hasMany(FarmActivityLog::class);
    }
}
