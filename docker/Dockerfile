FROM php:8.1-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    nano \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    sqlite3 \
    libsqlite3-dev \
    curl \
    gnupg \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite mbstring exif pcntl bcmath gd zip mysqli \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Install Node.js 22.14.0
RUN curl -fsSL https://nodejs.org/dist/v22.14.0/node-v22.14.0-linux-x64.tar.xz -o node.tar.xz \
    && mkdir -p /usr/local/lib/nodejs \
    && tar -xJf node.tar.xz -C /usr/local/lib/nodejs \
    && rm node.tar.xz \
    && ln -s /usr/local/lib/nodejs/node-v22.14.0-linux-x64/bin/node /usr/local/bin/node \
    && ln -s /usr/local/lib/nodejs/node-v22.14.0-linux-x64/bin/npm /usr/local/bin/npm \
    && ln -s /usr/local/lib/nodejs/node-v22.14.0-linux-x64/bin/npx /usr/local/bin/npx

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents
COPY ./ /var/www/html

# Copy PHP configuration
COPY ./docker/php.ini /usr/local/etc/php/

# Copy custom Apache configuration
COPY ./docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Enable the custom Apache configuration
RUN a2ensite 000-default.conf

# Expose port 80
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]