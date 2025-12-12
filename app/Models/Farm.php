<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Cluster;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farm extends Model
{
    use SoftDeletes;

    protected $table = 'farms';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'company_id',
        'location_data',
    ];

    protected $rules = [
        'name' => 'required|string',
        'company_id' => 'required|integer',
        'location_data' => 'required|string',
    ];

    // Validation message
    protected $messages = [
        'name.required' => 'Farm name is required.',
        'company_id.required' => 'Company ID is required.',
        'location_data.required' => 'Location data is required.',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class)->select('id', 'name');
    }

    public function cluster(){
        return $this->hasMany(Cluster::class);
    }
}
