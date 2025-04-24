<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MatchSeeder extends Seeder
{
    public function run()
    {
        // Set timezone to Vietnam
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        
        // Lấy thời gian hiện tại
        $now = Carbon::now();
        $today = $now->format('Y-m-d');
        
        // Làm tròn phút hiện tại về bội của 5 và đảm bảo không vượt quá 59
        $currentMinute = (int)$now->format('i');
        $roundedMinute = ceil($currentMinute / 5) * 5;
        if ($roundedMinute >= 60) {
            // Nếu làm tròn vượt 60, quay về 0 và tăng giờ lên 1
            $roundedMinute = 0;
            $now->addHour();
        }
        $baseTime = Carbon::parse($today . ' ' . $now->format('H') . ':' . str_pad($roundedMinute, 2, '0', STR_PAD_LEFT));
        
        // Các mốc thời gian cho từng trạng thái (bội của 5 phút)
        $timeH1 = $baseTime->copy()->subMinutes(20)->timestamp; // H1 - phút 20
        $timeHT = $baseTime->copy()->subMinutes(45)->timestamp; // HT - phút 45
        $timeH2 = $baseTime->copy()->subMinutes(70)->timestamp; // H2 - phút 70
        $timeOT = $baseTime->copy()->subMinutes(130)->timestamp; // OT - phút 110 (đã trừ 20' nghỉ)
        $timeEnd = $baseTime->copy()->subMinutes(110)->timestamp; // End - phút 95 + 15 phút nghỉ
        $timeNext = $baseTime->copy()->addMinutes(30)->timestamp; // Sắp diễn ra

        // Debug time
        echo "<!-- Current VN time: " . date('Y-m-d H:i:s', $now->timestamp) . " -->\n";
        echo "<!-- Base time (rounded): " . $baseTime->format('Y-m-d H:i:s') . " -->\n";
        echo "<!-- H1 time: " . date('Y-m-d H:i:s', $timeH1) . " (20') -->\n";
        echo "<!-- HT time: " . date('Y-m-d H:i:s', $timeHT) . " (45') -->\n";
        echo "<!-- H2 time: " . date('Y-m-d H:i:s', $timeH2) . " (70') -->\n";
        echo "<!-- OT time: " . date('Y-m-d H:i:s', $timeOT) . " (110') -->\n";
        echo "<!-- End time: " . date('Y-m-d H:i:s', $timeEnd) . " (95' + 15' break) -->\n";
        echo "<!-- Next time: " . date('Y-m-d H:i:s', $timeNext) . " -->\n";
        
        DB::table('matches')->insert([
            // Giải bóng đá nữ Algeria
            [
                'id' => 'AKBOUW-AFAKW-' . $now->timestamp,
                'competition_id' => 'ALG-W',
                'home_team_id' => 'AKBOU-W',
                'away_team_id' => 'AFAK-W',
                'status_id' => 1, // Chưa bắt đầu
                'match_time' => $timeNext,
                'home_scores' => json_encode([0, 0, 0, 0, 0, 0, 0]),
                'away_scores' => json_encode([0, 0, 0, 0, 0, 0, 0]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 'KHROUBW-ASEALGERW-' . $now->timestamp,
                'competition_id' => 'ALG-W',
                'home_team_id' => 'KHROUB-W',
                'away_team_id' => 'ASE-ALGER-W',
                'status_id' => 2, // Hiệp 1
                'match_time' => $timeH1,
                'home_scores' => json_encode([1, 1, 0, 0, 3, 0, 0]),
                'away_scores' => json_encode([0, 0, 0, 0, 1, 0, 0]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 'BELOUIZDADW-ASEBEJALAW-' . $now->timestamp,
                'competition_id' => 'ALG-W',
                'home_team_id' => 'BELOUIZDAD-W',
                'away_team_id' => 'ASE-BEJAIA-W',
                'status_id' => 3, // Nghỉ giữa hiệp
                'match_time' => $timeHT,
                'home_scores' => json_encode([2, 2, 0, 0, 5, 0, 0]),
                'away_scores' => json_encode([1, 1, 0, 0, 2, 0, 0]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
            // Liga U21 Youth Algeria
            [
                'id' => 'SAOURAU21-KABYLIEU21-' . $now->timestamp,
                'competition_id' => 'ALG-U21',
                'home_team_id' => 'SAOURA-U21',
                'away_team_id' => 'KABYLIE-U21',
                'status_id' => 4, // Hiệp 2
                'match_time' => $timeH2,
                'home_scores' => json_encode([1, 1, 0, 0, 4, 0, 0]),
                'away_scores' => json_encode([1, 1, 0, 0, 6, 0, 0]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            
            // Siêu cúp Ấn Độ - Bảng đấu A
            [
                'id' => 'HYDERABAD-SREENIDI-' . $now->timestamp,
                'competition_id' => 'IND-SC-A',
                'home_team_id' => 'HYDERABAD',
                'away_team_id' => 'SREENIDI',
                'status_id' => 5, // Hiệp phụ
                'match_time' => $timeOT,
                'home_scores' => json_encode([2, 1, 1, 0, 8, 0, 0]),
                'away_scores' => json_encode([2, 1, 1, 0, 7, 0, 0]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => 'SHEIKHJAMAL-BASHUNDHARA-' . $now->timestamp,
                'competition_id' => 'BAN-PL',
                'home_team_id' => 'SHEIKH-JAMAL',
                'away_team_id' => 'BASHUNDHARA',
                'status_id' => 8, // Kết thúc
                'match_time' => $timeEnd,
                'home_scores' => json_encode([4, 2, 2, 0, 12, 0, 0]),
                'away_scores' => json_encode([2, 1, 1, 0, 5, 0, 0]),
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
} 