# ベースイメージ：PHP 8.2 + Apache（Laravelに最適）
FROM php:8.2-apache

# 必要なパッケージをインストール（LaravelとViteが使えるようにする）
RUN apt-get update && apt-get install -y \
    zip unzip curl git libzip-dev libpng-dev libonig-dev libxml2-dev \
    libjpeg-dev libfreetype6-dev libpq-dev \
    # Node.jsの準備（18.xのセットアップ）
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    # PHP拡張モジュールをインストール（Laravelに必要）
    && docker-php-ext-install pdo_mysql mbstring zip

# Apacheのmod_rewriteを有効化（.htaccessのルーティングに必要）
RUN a2enmod rewrite

# Composer（PHPのパッケージ管理ツール）をインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Apacheの仮想ホスト設定をコンテナにコピー
COPY apache/default.conf /etc/apache2/sites-available/000-default.conf

# 作業ディレクトリをLaravelプロジェクトのルートに設定
WORKDIR /var/www/html
