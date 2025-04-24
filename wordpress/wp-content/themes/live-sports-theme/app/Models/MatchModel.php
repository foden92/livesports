<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Match data model
 */
class MatchModel extends Model
{
    /**
     * The table associated with the model
     */
    protected $table = 'matches';
    
    /**
     * The primary key for the model
     */
    protected $primaryKey = 'id';
    
    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'competition_id',
        'home_team_id',
        'away_team_id',
        'status_id',
        'match_time',
        'home_scores',
        'away_scores'
    ];

    /**
     * The attributes that should be cast
     */
    protected $casts = [
        'match_time' => 'datetime',
        'home_scores' => 'array',
        'away_scores' => 'array',
        'status_id' => 'integer'
    ];

    /**
     * Get the competition of this match
     */
    public function competition()
    {
        return $this->belongsTo('App\Models\Competition', 'competition_id');
    }

    /**
     * Get the home team
     */
    public function homeTeam()
    {
        return $this->belongsTo('App\Models\Team', 'home_team_id');
    }

    /**
     * Get the away team
     */
    public function awayTeam()
    {
        return $this->belongsTo('App\Models\Team', 'away_team_id');
    }

    /**
     * Get home team score (regular time)
     */
    public function getHomeScore()
    {
        $scores = $this->home_scores;
        return $scores[0] ?? 0;
    }

    /**
     * Get away team score (regular time)
     */
    public function getAwayScore()
    {
        $scores = $this->away_scores;
        return $scores[0] ?? 0;
    }

    /**
     * Get home team halftime score
     */
    public function getHomeHalftimeScore()
    {
        $scores = $this->home_scores;
        return $scores[1] ?? 0;
    }

    /**
     * Get away team halftime score
     */
    public function getAwayHalftimeScore()
    {
        $scores = $this->away_scores;
        return $scores[1] ?? 0;
    }

    /**
     * Get home team statistics
     */
    public function getHomeStats()
    {
        $scores = $this->home_scores;
        return [
            'red_cards' => $scores[2] ?? 0,
            'yellow_cards' => $scores[3] ?? 0,
            'corners' => $scores[4] ?? -1,
            'overtime_score' => $scores[5] ?? 0,
            'penalty_score' => $scores[6] ?? 0
        ];
    }

    /**
     * Get away team statistics
     */
    public function getAwayStats()
    {
        $scores = $this->away_scores;
        return [
            'red_cards' => $scores[2] ?? 0,
            'yellow_cards' => $scores[3] ?? 0,
            'corners' => $scores[4] ?? -1,
            'overtime_score' => $scores[5] ?? 0,
            'penalty_score' => $scores[6] ?? 0
        ];
    }
} 