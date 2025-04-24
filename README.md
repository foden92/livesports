# Live Sports Project

Dự án hiển thị kết quả trận đấu thể thao trực tiếp sử dụng WordPress.

### Yêu cầu Local Development
- Docker
- Docker Compose
- Git

## Cài đặt

1. Clone repository:
```bash
git clone <repository-url>
cd live-sports
```

2. Khởi động Docker containers:
```bash
# Lần đầu hoặc sau khi thay đổi Dockerfile/dependencies
docker-compose up -d --build

# Các lần chạy sau (nếu không có thay đổi về cấu hình)
docker-compose up -d
```

3. Cài đặt WordPress:
- Truy cập http://localhost:8000
- Chọn ngôn ngữ
- Điền thông tin cài đặt WordPress:
  - Tên website: Live Sports
  - Admin username: admin
  - Admin password: (password bạn tạo)
  - Admin email: email của bạn
- Click "Install WordPress"

4. Kích hoạt theme:
- Truy cập http://localhost:8000/wp-admin
- Vào Appearance > Themes
- Kích hoạt theme "Live Sports Theme"

5. Import dữ liệu mẫu:
```bash
# Chạy migrations
docker-compose exec -u www-data wordpress wp acorn migrate

# Import dữ liệu mẫu
docker-compose exec -u www-data wordpress wp acorn db:seed
```

## Cấu trúc Database

Database bao gồm các bảng chính:
- `wp_matches`: Lưu thông tin trận đấu
- `wp_teams`: Thông tin đội bóng
- `wp_competitions`: Thông tin giải đấu

Cấu trúc scores array:
```
[
  0 => "Score (regular time)",
  1 => "Halftime score",
  2 => "Red cards",
  3 => "Yellow cards",
  4 => "Corners",
  5 => "Overtime score",
  6 => "Penalty shootout score"
]
```

## Development

Theme assets (CSS, JS) được tự động build trong container. Các files được mount vào host machine thông qua Docker volumes.

Khi cần rebuild assets:
```bash
# Rebuild theme assets
docker-compose exec wordpress yarn build

# Hoặc build cho production
docker-compose exec wordpress yarn build:production
```

## Deployment

1. Trên server:
```bash
git clone <repository-url>
cd live-sports
docker-compose up -d --build
```

2. Làm theo các bước cài đặt từ bước 3-5 ở trên

## Troubleshooting

- Nếu gặp lỗi permissions: `chmod -R 777 wordpress/wp-content`
- Nếu không kết nối được database: Kiểm tra credentials trong docker-compose.yml
- Cache issues: `docker-compose exec wordpress wp cache flush`
- Nếu gặp lỗi khi chạy migrations/seeders: 
  - Kiểm tra database connection
  - Xem logs: `docker-compose logs wordpress`

## License

Private project - All rights reserved 