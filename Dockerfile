# Utiliser une image PHP avec Apache pour exécuter Laravel
FROM php:8.0.28-apache

# Installer les dépendances nécessaires pour Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo pdo_mysql

# Installer Composer (gestionnaire de dépendances PHP)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Installer Node.js (si tu utilises Laravel Mix pour le front-end)
# RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && \
#     apt-get install -y nodejs

# Copier seulement les fichiers nécessaires dans l'image Docker (en utilisant .dockerignore)
COPY . /var/www/html/

# Définir les bonnes permissions pour les fichiers et répertoires
RUN chown -R www-data:www-data /var/www/html

# Copier la configuration Apache (assurez-vous que ce fichier existe)
COPY ./docker/apache2/000-default.conf /etc/apache2/sites-available/000-default.conf

# Activer le module mod_rewrite d'Apache pour Laravel
RUN a2enmod rewrite

# Exposer le port 80 (par défaut utilisé par Apache)
EXPOSE 80

# Installer les dépendances PHP via Composer (après avoir copié les fichiers)
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# Si vous utilisez Laravel Mix (npm/yarn), installer les dépendances JavaScript
# RUN npm install && npm run prod

# Lancer Apache en mode foreground
CMD ["apache2-foreground"]
