# Kuu Project

このプロジェクトはDocker Composeを使用して、Laravel、Apache、MySQL、phpMyAdminの環境を簡単に構築できるようにしたものです。

## 構成

このプロジェクトは以下の3つのサービスで構成されています：

- **app**: Laravel + Apache が動作するアプリケーションサービス
- **db**: MySQL 8.0 データベースサービス
- **phpmyadmin**: データベース管理用のphpMyAdminサービス

## 必要条件

- Docker Engine
- Docker Compose

## 使用方法

### 1. 環境のセットアップと起動

プロジェクトのルートディレクトリで以下のコマンドを実行してください：

```bash
docker-compose up -d
```

これにより、バックグラウンドでコンテナが起動します。

### 2. アクセス方法

- **Laravel アプリケーション**: http://localhost:8000
- **phpMyAdmin**: http://localhost:8080
  - ユーザー名: root
  - パスワード: hoge

### 3. データベース情報

- **データベース名**: kuu_db
- **ユーザー名**: root
- **パスワード**: hoge
- **ホスト**: db (コンテナ内からの接続時)
- **ホスト**: localhost:3306 (ホストマシンからの接続時)

### 4. コンテナの停止

```bash
docker-compose down
```

バックグラウンドで実行中のコンテナを停止します。

### 5. コンテナとボリュームの削除

```bash
docker-compose down -v
```

データベースの永続化ボリュームも含めて、すべてのコンテナとデータを削除します。

## ボリュームについて

データベースのデータは名前付きボリューム `db-data` に永続化されます。このため、コンテナを再起動してもデータは保持されます。

## カスタマイズ

設定を変更する場合は、`docker-compose.yml` ファイルを編集してください。主な変更点：

- ポート番号
- データベース名
- パスワード
- マウントボリューム

変更後は以下のコマンドで環境を再構築してください：

```bash
docker-compose down
docker-compose up -d --build
```

## トラブルシューティング

### ポートの競合

もし8000、3306、または8080ポートが既に使用されている場合は、`docker-compose.yml`ファイルの`ports`セクションで別のポート番号に変更できます。

### 起動しない場合

```bash
docker-compose logs
```

でログを確認して問題を特定してください。