<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Team data model
 */
class Team extends Model
{
    /**
     * The table associated with the model
     */
    protected $table = 'teams';
    
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
        'competition_id',
        'country_id',
        'name',
        'logo'
    ];

    /**
     * Get the competition this team belongs to
     */
    public function competition()
    {
        return $this->belongsTo('App\Models\Competition');
    }

    /**
     * Get the country this team belongs to
     */
    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    /**
     * Get matches where this team plays as home team
     */
    public function homeMatches()
    {
        return $this->hasMany('App\Models\MatchModel', 'home_team_id');
    }

    /**
     * Get matches where this team plays as away team
     */
    public function awayMatches()
    {
        return $this->hasMany('App\Models\MatchModel', 'away_team_id');
    }
} 