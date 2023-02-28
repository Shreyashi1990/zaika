FROM php:7.4-apache
  
# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
#COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy source code
COPY . .

# Install dependencies
#RUN composer install

# Set file and folder permissions
#RUN chown -R www-data:www-data storage bootstrap/cache
#RUN chmod -R 775 storage bootstrap/cache

# Expose port 80
EXPOSE 8000
