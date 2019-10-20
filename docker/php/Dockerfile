FROM jcordova1993/php7.2-git-composer

RUN apt-get install -y \
        libzip-dev \
        zip \
        libpng-dev \
        libwebp-dev \
        libjpeg62-turbo-dev \
        libxpm-dev \
        libfreetype6-dev \
  && docker-php-ext-configure zip --with-libzip \
  && docker-php-ext-install zip \
  && docker-php-ext-install pdo_mysql
  

RUN docker-php-ext-configure gd \
  --with-gd \
  --with-webp-dir \
  --with-jpeg-dir \
  --with-png-dir \
  --with-zlib-dir \
  --with-xpm-dir \
  --with-freetype-dir \
  --enable-gd-native-ttf

RUN docker-php-ext-install gd
RUN docker-php-ext-install exif

EXPOSE 8000  
CMD ["php-fpm"]