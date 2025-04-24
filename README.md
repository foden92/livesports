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

2. Tạo file .env từ mẫu:
```bash
# Copy file mẫu
cp .env.example .env

# Chỉnh sửa các thông số trong .env:
# Database Configuration
# - MYSQL_DATABASE=database_name
# - MYSQL_USER=database_user
# - MYSQL_PASSWORD=database_password
# - MYSQL_ROOT_PASSWORD=root_password

# WordPress Configuration
# - WORDPRESS_DB_HOST=db
# - WORDPRESS_DB_NAME=database_name
# - WORDPRESS_DB_USER=database_user
# - WORDPRESS_DB_PASSWORD=database_password
# - WORDPRESS_DEBUG=1

# Ports (có thể thay đổi nếu port bị conflict)
# - WORDPRESS_PORT=8000
# - PHPMYADMIN_PORT=8080

# PHPMyAdmin
# - PMA_HOST=db
```

3. Khởi động Docker containers:
```bash
# Lần đầu hoặc sau khi thay đổi Dockerfile/dependencies
docker-compose up -d --build

# Các lần chạy sau (nếu không có thay đổi về cấu hình)
docker-compose up -d
```

4. Cài đặt WordPress:
- Truy cập http://localhost:8000
- Chọn ngôn ngữ
- Điền thông tin cài đặt WordPress:
  - Tên website: Live Sports
  - Admin username: admin
  - Admin password: (password bạn tạo)
  - Admin email: email của bạn
- Click "Install WordPress"

5. Kích hoạt theme:
- Truy cập http://localhost:8000/wp-admin
- Vào Appearance > Themes
- Kích hoạt theme "Live Sports Theme"

Nếu gặp lỗi không tìm thấy file manifest.json, chạy lệnh sau:
```bash
docker-compose exec wordpress bash -c "cd wp-content/themes/live-sports-theme && yarn build"
```

6. Import dữ liệu mẫu:
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

# Copy và cấu hình .env cho môi trường production
cp .env.example .env
# Chỉnh sửa các thông số phù hợp với môi trường production
# - Đổi database credentials
# - Tắt WORDPRESS_DEBUG
# - Cấu hình ports nếu cần

# Khởi động containers
docker-compose up -d --build
```

2. Làm theo các bước cài đặt từ bước 4-6 ở trên

## Troubleshooting

- Nếu gặp lỗi permissions: `chmod -R 777 wordpress/wp-content`
- Nếu không kết nối được database: Kiểm tra credentials trong .env
- Cache issues: `docker-compose exec wordpress wp cache flush`
- Nếu gặp lỗi khi chạy migrations/seeders: 
  - Kiểm tra database connection trong .env
  - Xem logs: `docker-compose logs wordpress`

## License

Private project - All rights reserved 