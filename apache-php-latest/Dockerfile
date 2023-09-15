# Use the official PHP image with Apache.
FROM php:apache

# Install system dependencies and PHP extensions required for your application
RUN apt-get update && \
    apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql

# Enable Apache modules and write settings.
RUN a2enmod rewrite

# Remove the default index.html file Apache creates.
RUN rm -f /var/www/html/index.html

# Copy your source code to the appropriate directory in the image.
COPY src/ /var/www/html/

# Expose port 80 for the web server.
EXPOSE 80

# Start the Apache web server.
CMD ["apache2-foreground"]
