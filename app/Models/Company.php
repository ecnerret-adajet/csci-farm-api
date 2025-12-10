<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Farm;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use SoftDeletes;
    
    protected $table = 'companies';
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'name',
    ];

    // Rules for validation
    protected $rules = [
        'name' => 'required|string',
    ];

    // Validation messages
    protected $messages = [
        'name.required' => 'Name is required',
        'name.string' => 'Name must be a string',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function farms()
    {
        return $this->hasMany(Farm::class);
    }
}
