<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Competition data model
 */
class Competition extends Model
{
    /**
     * The table associated with the model
     */
    protected $table = 'competitions';
    
    /**
     * The primary key for the model
     */
    protected $primaryKey = 'id';

    /**
     * The data type of the primary key
     */
    protected $keyType = 'string';
    
    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'name',
        'logo'
    ];

    /**
     * Get teams in this competition
     */
    public function teams()
    {
        return $this->hasMany('App\Models\Team', 'competition_id');
    }

    /**
     * Get matches in this competition
     */
    public function matches()
    {
        return $this->hasMany('App\Models\MatchModel', 'competition_id');
    }
} 