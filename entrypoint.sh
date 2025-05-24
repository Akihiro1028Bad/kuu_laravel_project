#!/bin/bash
set -e

cd /var/www/html

if [ -f artisan ]; then
  echo "✅ Laravel プロジェクトを確認しました"

  # Composer install（初回セットアップも含む）
  echo "📦 Composer パッケージをインストール中..."
  composer install --no-interaction --prefer-dist --optimize-autoloader

  # S3 パッケージが未インストールなら追加
  if ! composer show league/flysystem-aws-s3-v3 > /dev/null 2>&1; then
    echo "☁️ S3 パッケージを追加インストール中..."
    composer require league/flysystem-aws-s3-v3:^3.0 --no-interaction
  fi

  # 日本語翻訳が未インストールなら追加
  if [ ! -d resources/lang/ja ]; then
    echo "🌐 日本語翻訳をインストール中..."
    composer require laravel-lang/lang:^15.0 --no-interaction
    php artisan lang:add ja
  fi

  # ストレージリンク作成（必要に応じて）
  if [ ! -e public/storage ]; then
    echo "🔗 storage:link 実行中..."
    php artisan storage:link
  fi

  # Laravelキャッシュをクリア
  echo "🧹 キャッシュをクリア中..."
  php artisan config:clear
  php artisan cache:clear
  php artisan view:clear
fi

exec "$@"
