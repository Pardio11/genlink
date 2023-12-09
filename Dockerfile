FROM ubuntu:20.04

RUN apt-get update -y

#Installing apache in non-interactive mode
ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get install apache2 -y


#Installing PHP v 8.2
RUN apt-get -y install software-properties-common && \
    add-apt-repository ppa:ondrej/php && \
    apt-get update && \
    apt-get -y install php8.2

#Install required PHP extensions
RUN apt-get install -y php8.2-bcmath php8.2-fpm php8.2-xml php8.2-mysql php8.2-zip php8.2-intl php8.2-ldap php8.2-gd php8.2-cli php8.2-bz2 php8.2-curl php8.2-mbstring php8.2-pgsql php8.2-opcache php8.2-soap php8.2-cgi

#Install Composer
RUN apt-get update && apt-get -y install php-cli unzip && \
    cd ~ && apt-get -y install curl && \
    curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php && \
    HASH=`curl -sS https://composer.github.io/installer.sig` && \
    php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && \
    php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Install MySQL
RUN apt-get install -y mysql-server

# MySQL Configuration
# Note: The following commands are basic. You might want to customize the MySQL configuration.
RUN service mysql start && \
    mysql -e "CREATE USER 'genlink'@'localhost' IDENTIFIED BY 'genlink';" && \
    mysql -e "GRANT ALL PRIVILEGES ON *.* TO 'genlink'@'localhost';" && \
    mysql -e "FLUSH PRIVILEGES;"

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN service apache2 restart    

EXPOSE 80 3306

CMD ["apachectl", "-D", "FOREGROUND"]