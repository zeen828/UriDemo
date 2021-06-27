# 短網址系統

## 開發使用版本
+ PHP 8.0.7 (cli) (built: Jun  2 2021 00:41:03) ( ZTS Visual C++ 2019 x64 )
+ Laravel 8.40
+ MySQL 8.0.25.0
+ Redis 3.0.504

## 功能
1. 輸入網址產生一個短網址
2. 短網址資訊

## 資料庫
+ 網址轉換短網址 - uri_srt
+ 訪問LOG - uri_log

## 指令
```bash
php -S 127.0.0.1:3000
php artisan serve
```

## 專案安裝
1. 安裝套件
```bash
composer install
```
2. Laravel設定檔
```bash
# linux
cp .env.example .env
# windows
copy .env.example .env
```
3. Laravel Key
```bash
php artisan key:generate
```
4. 遷移
```bash
php artisan migrate
# linux
php artisan migrate --path=/database/migrations/20210626
# windows
php artisan migrate --path="database\migrations\20210626"
```
5. 運行
```bash
php artisan serve
# PHP8起一個服務
php -S 127.0.0.1:3000
```

## 單元測試
1. 連線測試
php artisan make:test UriIndexTest
php artisan make:test UriPostTest
php artisan make:test GoSrtTest
php artisan make:test GoSrtInfoTest
1. 資料寫入測試
2. 唯一字串寫入
