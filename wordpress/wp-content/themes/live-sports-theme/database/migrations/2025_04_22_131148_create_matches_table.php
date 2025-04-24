<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('competition_id');
            $table->string('home_team_id');
            $table->string('away_team_id');
            $table->integer('status_id')->comment('1: Not started, 2: First half, 3: Halftime, 4: Second half, 5: Overtime, 6: Overtime(deprecated), 7: Penalty Shoot-out, 8: End, 9: Delay');
            $table->integer('match_time')->comment('example: 1649095322');
            $table->json('home_scores')->comment('Home team score field description
Example: [1, 0, 0, 0, -1, 0, 0]
Enum:
0: "Score (regular time) (integer type)"
1: "Halftime score (integer type)"
2: "Red cards (integer type)"
3: "Yellow cards (integer type)"
4: "Corners, -1 means no corner kick data(integer type)"
5: "Overtime score (120 minutes, including regular time), only available in overtime (integer type)"
6: "Penalty shootout score, only penalty shootout"');
            $table->json('away_scores')->comment('Away team score field description
Example: [1, 0, 0, 0, -1, 0, 0]
Enum:
0: "Score (regular time) (integer type)"
1: "Halftime score (integer type)"
2: "Red cards (integer type)"
3: "Yellow cards (integer type)"
4: "Corners, -1 means no corner kick data(integer type)"
5: "Overtime score (120 minutes, including regular time), only available in overtime (integer type)"
6: "Penalty shootout score, only penalty shootout"');
            $table->timestamps();

            $table->foreign('competition_id')->references('id')->on('competitions')->onDelete('cascade');
            $table->foreign('home_team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('away_team_id')->references('id')->on('teams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matches');
    }
};
