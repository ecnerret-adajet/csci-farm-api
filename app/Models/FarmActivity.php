<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ActivityType;
use App\Models\Field;
use App\Models\FarmActivityLog;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FarmActivity extends Model
{
    use SoftDeletes;

    protected $table = 'farm_activities';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'field_id',
        'activity_type_id',
        'planned_dap',
        'activity_name',
        'mandays_required',
        'needed_mandays',
        'total_accomplished_mandays',
        'planned_start_date',
        'actual_start_date',
        'actual_end_date',
        'status',
    ];

    // Validation rules
    protected $rules = [
        'activity_name' => 'required|unique:farm_activities,activity_name',
        'activity_type_id' => 'required|unique:farm_activities,activity_type_id',
        'planned_dap' => 'required|numeric',
        'activity_name' => 'required',
        'mandays_required' => 'required',
        'needed_mandays' => 'required',
        'total_accomplished_mandays' => 'required',
        'planned_start_date' => 'required',
        'actual_start_date' => 'required',
        'actual_end_date' => 'required',
        'status' => 'required',
    ];

    // Validation message
    protected $messages = [
        'activity_name.required' => 'Activity name is required.',
        'activity_name.unique' => 'Activity name already exist.',
        'activity_type_id.required' => 'Activity type is required.',
        'activity_type_id.unique' => 'Activity type already exist.',
        'planned_dap.required' => 'Planned DAP is required.',
        'planned_dap.numeric' => 'Planned DAP must be numeric.',
        'mandays_required.required' => 'Mandays required is required.',
        'needed_mandays.required' => 'Needed mandays is required.',
        'total_accomplished_mandays.required' => 'Total accomplished mandays is required.',
        'planned_start_date.required' => 'Planned start date is required.',
        'actual_start_date.required' => 'Actual start date is required.',
        'actual_end_date.required' => 'Actual end date is required.',
        'status.required' => 'Status is required.',
    ];

    public function activityType()
    {
        return $this->hasOne(ActivityType::class);
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function farmActivityLogs()
    {
        return $this->hasMany(FarmActivityLog::class);
    }
}
