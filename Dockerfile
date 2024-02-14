FROM php:7.4-apache

# Instala a extensão PDO MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Copie o arquivo de configuração do VirtualHost para o container
COPY ./.infra/000-default.conf /etc/apache2/sites-available/000-default.conf

# Ative o site no Apache
RUN a2ensite 000-default.conf

# Habilite o módulo rewrite do Apache
RUN a2enmod rewrite

# Reinicie o serviço Apache para aplicar as alterações
RUN service apache2 restart