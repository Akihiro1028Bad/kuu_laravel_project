# PHP 8.2 + Apache をベースにした Laravel 向けイメージ
FROM php:8.2-apache

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y \
    zip unzip curl git libzip-dev libpng-dev libonig-dev libxml2-dev \
    libjpeg-dev libfreetype6-dev libpq-dev \
    # Node.js のセットアップ（18.x）
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    # Laravel に必要な PHP 拡張をインストール
    && docker-php-ext-install pdo_mysql mbstring zip bcmath

# Apache の mod_rewrite を有効化
RUN a2enmod rewrite

# Composer をインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# カスタム php.ini をマウントする前提なので Dockerfile では追加しない

# Apache 仮想ホスト設定（必要な場合のみ）
COPY apache/default.conf /etc/apache2/sites-available/000-default.conf

# 作業ディレクトリ（マウントされる Laravel プロジェクトのルート）
WORKDIR /var/www/html

# エントリーポイントスクリプトを追加
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# 起動時に Laravel の依存を整える
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

# Apache を起動
CMD ["apache2-foreground"]
