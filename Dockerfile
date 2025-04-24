FROM wordpress:latest

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    curl \
    && docker-php-ext-install zip pdo pdo_mysql

# Install WP-CLI
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x wp-cli.phar \
    && mv wp-cli.phar /usr/local/bin/wp

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Node.js and Yarn
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g yarn

# Set working directory
WORKDIR /var/www/html/wp-content/themes/live-sports-theme

# Create public directory
RUN mkdir -p public/build && \
    chown -R www-data:www-data public && \
    chmod -R 755 public

# Install Composer dependencies
COPY wordpress/wp-content/themes/live-sports-theme/composer.json .
RUN mkdir -p database/seeders
RUN rm -f composer.lock && composer install --no-dev --verbose

# Copy theme files
COPY wordpress/wp-content/themes/live-sports-theme .

# Install yarn dependencies and build
RUN yarn install
RUN yarn build

# Generate optimized autoloader
RUN composer dump-autoload --optimize

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html/wp-content

# Clean up
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Reset working directory
WORKDIR /var/www/html 