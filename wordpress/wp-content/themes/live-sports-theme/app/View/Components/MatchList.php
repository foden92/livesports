<?php

namespace App\View\Components;

use App\Models\MatchModel;
use Illuminate\View\Component;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Component for displaying match list
 */
class MatchList extends Component
{
    /**
     * List of matches grouped by competition
     */
    public $matches;

    /**
     * List title (optional)
     */
    public $title;

    /**
     * Status filter
     */
    public $filter;

    /**
     * Create a new component instance
     */
    public function __construct($title = null, $filter = 'all')
    {
        $this->title = $title;
        $this->filter = $filter;
        $this->matches = $this->getMatchesFromDatabase();
    }

    /**
     * Get matches data from database using Eloquent
     */
    private function getMatchesFromDatabase(): Collection
    {
        try {
            // Build query using Model relationships
            $query = MatchModel::query()
                ->with(['competition', 'homeTeam', 'awayTeam']);

            // Apply status filters
            if ($this->filter === 'live') {
                $query->whereIn('status_id', [2, 3, 4, 5, 7]); // Live matches
            } elseif ($this->filter === 'finished') {
                $query->whereIn('status_id', [8, 9]); // Finished matches
            } elseif ($this->filter === 'scheduled') {
                $query->where('status_id', 1); // Upcoming matches
            }

            // Execute query and get matches
            $matches = $query->orderBy('match_time', 'desc')->get();

            if ($matches->isEmpty()) {
                return collect();
            }

            // Group matches by competition name
            return $matches->groupBy(function ($match) {
                return $match->competition->name ?? 'Unknown';
            });

        } catch (\Exception $e) {
            return collect();
        }
    }

    /**
     * Get the view / contents that represent the component
     */
    public function render()
    {
        return view('components.match-list');
    }
} 