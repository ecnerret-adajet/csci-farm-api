<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Material;
use App\Models\FarmActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class MaterialApplication extends Model
{
    use SoftDeletes;

    protected $table = 'material_application';

    protected $fillable = [
        'material_id',
        'farm_activity_id',
        'quantity_planned',
        'quantity_actual',
    ];

    protected $rules = [
        'material_id' => 'required|string',
        'farm_activity_id' => 'required|string',
        'quantity_planned' => 'required|integer',
        'quantity_actual' => 'required|integer',
    ];

    protected $messages = [
        'material_id.required' => 'Material ID is required.',
        'farm_activity_id.required' => 'Farm Activity ID is required.',
        'quantity_planned.required' => 'Quantity Planned is required.',
        'quantity_actual.required' => 'Quantity Actual is required.',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function farmActivity()
    {
        return $this->belongsTo(FarmActivity::class);
    }
}
