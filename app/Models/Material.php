<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    use SoftDeletes;

    protected $table = 'materials';

    protected $fillable = [
        'name',
        'unit_of_measure',
        'description'
    ];

    protected $rules = [
        'name' => 'required|string',
        'unit_of_measure' => 'required|string',
        'description' => 'nullable|string',
    ];

    protected $messages = [
        'name.required' => 'Material name is required.',
        'unit_of_measure.required' => 'Unit of measure is required.',
        'description.required' => 'Description is required.',  
    ];

    public function materialApplication()
    {
        return $this->hasMany(MaterialApplication::class);
    }
}
