{{-- Component hiển thị danh sách trận đấu --}}
<div class="match-list">

    {{-- Lặp qua từng giải đấu --}}
    @foreach($matches as $competitionName => $competitionMatches)
        <div class="competition-group">
            {{-- Phần header của giải đấu --}}
            <div class="competition-header">
                @if(isset($competitionMatches[0]->competition->logo))
                    <img src="{{ $competitionMatches[0]->competition->logo }}" alt="{{ $competitionName }}" class="country-flag">
                @endif
                <span class="competition-name">{{ $competitionName }}</span>
            </div>

            {{-- Danh sách các trận đấu --}}
            <div class="matches">
                @foreach($competitionMatches as $match)
                    <div class="match-item">
                        {{-- Star icon --}}
                        <div class="star-icon">★</div>

                        {{-- Match time --}}
                        <div class="match-time">
                            @php
                                // Parse datetime string to Carbon instance
                                $matchTime = \Carbon\Carbon::parse($match->match_time)
                                    ->timezone('Asia/Ho_Chi_Minh');
                                echo $matchTime->format('H:i');
                            @endphp
                        </div>

                        {{-- Match status --}}
                        <div class="match-status">
                            @php
                                // Đặt timezone về VN
                                date_default_timezone_set('Asia/Ho_Chi_Minh');
                                $now = now()->timezone('Asia/Ho_Chi_Minh');
                                $matchTime = \Carbon\Carbon::parse($match->match_time)
                                    ->timezone('Asia/Ho_Chi_Minh');
                            @endphp
                            @if($match->status_id == 2 || $match->status_id == 4)
                                @php
                                    // Nếu thời gian hiện tại > thời gian trận đấu
                                    if ($now->gt($matchTime)) {
                                        $diffMinutes = ceil($matchTime->diffInMinutes($now)); // Làm tròn lên
                                        
                                        // Hiệp 1: 0-45 phút
                                        if ($match->status_id == 2) {
                                            $currentMinute = min(45, $diffMinutes);
                                        }
                                        // Hiệp 2: 46-90 phút
                                        else {
                                            $h2Minutes = $diffMinutes - 15; // Trừ đi 15 phút nghỉ giữa hiệp
                                            $currentMinute = min($h2Minutes, 90); // Hiển thị phút thực nhưng max là 90
                                        }
                                    } else {
                                        $currentMinute = $match->status_id == 2 ? 1 : 46;
                                    }
                                @endphp
                                <span class="live-minute">{{ $currentMinute }}′</span>
                            @elseif($match->status_id == 3)
                                <span class="break-status">Nghỉ giữa hiệp</span>
                            @elseif($match->status_id == 5)
                                @php
                                    $diffMinutes = ceil($matchTime->diffInMinutes($now));
                                    $playedMinutes = $diffMinutes - 20;
                                    $playedMinutes = min(120, $playedMinutes);
                                @endphp
                                <span class="live-minute">Hiệp phụ {{ $playedMinutes }}′</span>
                            @elseif($match->status_id == 6)
                                <span class="live-minute">Hiệp phụ</span>
                            @elseif($match->status_id == 7)
                                <span class="live-minute">Penalty</span>
                            @elseif($match->status_id == 8)
                                <span class="finished">Kết thúc</span>
                            @elseif($match->status_id == 9)
                                <span class="delay">Hoãn</span>
                            @elseif($match->status_id == 1)
                                <span class="not-started">Chưa bắt đầu</span>
                            @endif
                        </div>

                        {{-- Teams and score --}}
                        <div class="match-teams">
                            <div class="team home">
                                <span class="team-name">{{ $match->homeTeam->name }}</span>
                                <img src="{{ $match->homeTeam->logo }}" alt="{{ $match->homeTeam->name }}" class="team-logo">
                            </div>

                            <div class="score-display {{ in_array($match->status_id, [2,3,4,8]) ? 'active' : '' }}">
                                {{ $match->getHomeScore() }}-{{ $match->getAwayScore() }}
                            </div>

                            <div class="team away">
                                <img src="{{ $match->awayTeam->logo }}" alt="{{ $match->awayTeam->name }}" class="team-logo">
                                <span class="team-name">{{ $match->awayTeam->name }}</span>
                            </div>
                        </div>

                        {{-- Match info --}}
                        <div class="match-info">
                            <span class="ht-score">
                                HT {{ $match->getHomeHalftimeScore() }}-{{ $match->getAwayHalftimeScore() }}
                            </span>
                            {{-- Corner stats --}}
                            @php
                                $homeStats = $match->getHomeStats();
                                $awayStats = $match->getAwayStats();
                            @endphp
                            @if($homeStats['corners'] >= 0 && $awayStats['corners'] >= 0)
                                <span class="corner-stats">
                                    <span class="corner-icon">⚑</span>
                                    {{ $homeStats['corners'] }}-{{ $awayStats['corners'] }}
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div> 