# FashionablyLate

## 前提条件

- Dockerがインストールされていること
- Docker Composeがインストールされていること

## 環境構築

1. リポジトリをクローンしたい任意のディレクトリで以下のコマンドを実行してください。

    ```bash
    git clone https://github.com/fukuda983667/FashionablyLate
    ```

2. Docker Composeを使用してコンテナを作成・起動します。※Docker Descktop起動時に実行してください。

    ```bash
    docker-compose up -d --build
    ```

3. phpコンテナにログイン→`composer`をインストールします。

    ```bash
    docker-compose exec php bash
    ```
    ```
    composer install
    ```

2. `.env.example`ファイルをコピーして`.env`ファイルを作成します。

    ```bash
    cp .env.example .env
    ```

3. `.env`ファイルを編集し、必要な環境変数を設定します（11～16行目）。

   ```
   DB_CONNECTION=mysql
   DB_HOST=mysql
   DB_PORT=3306
   DB_DATABASE=laravel_db
   DB_USERNAME=laravel_user
   DB_PASSWORD=laravel_pass
   ```

7. アプリケーションキーを生成します。

    ```bash
    php artisan key:generate
    ```

8. データベースのマイグレーションを実行します。

    ```bash
    php artisan migrate
    ```

8. データベースのシーディングを実行します。

    ```bash
    php artisan db:seed
    ```

9. アプリケーションがhttp://localhost で利用可能になります。

## 仕様技術(実行環境)

- PHP : 7.4.9
- Laravel : 8.83.27
- MySQL : 8.0.26
- NGINX : 1.21.1
- docker-compose.yml : 3.8

## 注意事項

- このプロジェクトは開発用途でのみ使用されることを想定しています。本番環境へのデプロイの際にはセキュリティ上の考慮事項がありますので、十分な検討が必要です。

## ライセンス

[ライセンス名]（LICENSE）ファイルでライセンスに関する詳細を確認してください。
