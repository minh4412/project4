# Sử dụng image PHP 8.2 chính thức có sẵn Composer
FROM php:8.0.30-cli

# Cài các extension Laravel cần
RUN apt-get update --fix-missing && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Cài Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Đặt thư mục làm việc
WORKDIR /var/www/html

# Sao chép toàn bộ project vào container
COPY . .

# Cài đặt thư viện PHP
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

#Cài thêm gettext vào Docker image
RUN docker-php-ext-install gettext

# Mở cổng 80
EXPOSE 80

# Lệnh khởi chạy container
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
