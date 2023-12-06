FROM php:8-apache

# Instala dependencias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo pdo_mysql

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configura el directorio de trabajo
WORKDIR /var/www/html  # Cambiado a /var/www/laravel

# Establece permisos adecuados
RUN chown -R www-data:www-data /var/www/html

# Copia el proyecto Laravel al contenedor
COPY . . 

# Instala las dependencias de Laravel
RUN composer install

