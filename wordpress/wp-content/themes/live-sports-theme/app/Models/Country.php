<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Country data model
 */
class Country extends Model
{
    /**
     * The table associated with the model
     */
    protected $table = 'countries';
    
    /**
     * The primary key for the model
     */
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'name',
        'logo'
    ];

    /**
     * Get teams from this country
     */
    public function teams()
    {
        return $this->hasMany('App\Models\Team', 'country_id');
    }
} 