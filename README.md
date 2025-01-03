1. Tải dự án từ GitHub
Sử dụng lệnh Git hoặc tải trực tiếp:

Clone dự án:
git clone https://github.com/thanvu1/btlhqtcsdl.git
cd btlhqtcsdl

2. Cài đặt các phụ thuộc
Chạy lệnh sau trong thư mục dự án để cài đặt các package PHP được định nghĩa trong composer.json:

composer install

3. Tạo file .env
File .env lưu trữ cấu hình môi trường như cơ sở dữ liệu, URL ứng dụng, v.v.

Nếu dự án đã có file .env.example, sao chép file này:

cp .env.example .env

Chỉnh sửa file .env: Mở file .env và cập nhật các thông tin sau:

DB_CONNECTION=sqlsrv
DB_HOST=Sever name
DB_PORT=1433
DB_DATABASE=QuanLyKhachSan
DB_USERNAME=
DB_PASSWORD=

4. Tạo khóa ứng dụng
Laravel yêu cầu một khóa mã hóa ứng dụng (APP_KEY). Tạo khóa này bằng cách chạy:

php artisan key:generate

5. Cài đặt cơ sở dữ liệu
Tạo cơ sở dữ liệu mới:
Chạy migration:
Chạy lệnh sau để tạo các bảng trong cơ sở dữ liệu:

php artisan migrate

Xóa cache (nếu cần)
Nếu gặp lỗi liên quan đến cache, hãy xóa cache bằng các lệnh sau:

php artisan config:clear
php artisan cache:clear
php artisan view:clear

=>chạy ưng dụng.