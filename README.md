# Phần mềm quản lý thư viện

## Mô tả
Đây là phần mềm quản lý thư viện được viết bằng Laravel Framework. Phần mềm có các chức năng cơ bản như quản lý sách, quản lý độc giả, quản lý mượn trả sách, thống kê sách, quản lý độc giả, ...

Danh sách thành viên nhóm:
- Nguyễn Thế Đạt - 20120055
- Nguyễn Trọng Hiếu - 20120083
- Lê Nguyễn Thanh Hoàng - 20120088
- Lê Hoàng Huy - 20120105
- Đào Khoa Nguyên - 20120147

## Môi trường thực thi
- Hệ điều hành: WSL2 (Ubuntu 20.04)
- Framework: Laravel 8
- Database: Sqlite3
- SDK: PHP 7.3 hoặc 8.0
- IDE: Visual Studio Code và PHPStorm
- DevTools: Git, Composer, NodeJS, NPM, ...

## Cài đặt và chạy thử local
clone the repo
```
git clone https://github.com/kenroly/IntroductionToSoftwareEngineering
```

change current directory

```
cd IntroductionToSoftwareEngineering
```
install dependencies
```
composer install
```
install js dependencies
```
npm install && npm run dev
```
create .env file
```
cp (Linux) or copy (Windows) .env.example .env
```
generate env key
```
php artisan key:generate
```
migrate the migration and seed the database
```
php artisan migrate:fresh --seed
```
start server
```
php artisan serve
```
credentails
```
username: thedat
password: password
```

# Current status
- Authentication
- Quản lý nhân viên
- Quản lý sách (sách, tác giả, thể loại, nhà xuất bản)
- Quản lý độc giả
- Quản lý mượn trả sách
- Các thống kê sách

# Future work
- SMTP mail
- ISBN and Barcode
- Fix bug
- Nâng cấp UX/UI
- Phân quyền hệ thống
- Thêm các chức năng khác