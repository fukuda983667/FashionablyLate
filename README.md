# FashionablyLate

このプロジェクトは、NGINX、MySQL、Laravel、Docker、およびDockerを使用して構築されたWebアプリケーションです。

## 前提条件

- Dockerがインストールされていること
- Docker Composeがインストールされていること

## 環境構築

1. リポジトリをクローンしたい任意のディレクトリで以下のコマンドを実行してください。

    ```bash
    git clone https://github.com/fukuda983667/FashionablyLate
    ```

2. Docker Composeを使用してコンテナを作成・起動します。

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

3. `.env`ファイルを編集し、必要な環境変数を設定します（11～17行目）。

   ```
   DB_CONNECTION=mysql
   DB_HOST=mysql
   DB_PORT=3306
   DB_DATABASE=laravel_db
   DB_USERNAME=laravel_user
   DB_PASSWORD=laravel_pass
   ```

5. Docker Composeを使用してコンテナを起動します。

    ```bash
    docker-compose up -d
    ```

6. Laravelアプリケーションの依存関係をインストールします。

    ```bash
    docker-compose exec app composer install
    ```

7. アプリケーションキーを生成します。

    ```bash
    docker-compose exec app php artisan key:generate
    ```

8. データベースのマイグレーションを実行します。

    ```bash
    docker-compose exec app php artisan migrate
    ```

9. アプリケーションがhttp://localhost で利用可能になります。

## 使用法

- NGINXはポート80で待ち受けており、http://localhost でアクセスできます。
- Laravelアプリケーションのコードは`app`ディレクトリにマウントされています。変更を加えると、コンテナ内で即座に反映されます。

## 注意事項

- このプロジェクトは開発用途でのみ使用されることを想定しています。本番環境へのデプロイの際にはセキュリティ上の考慮事項がありますので、十分な検討が必要です。

## ライセンス

[ライセンス名]（LICENSE）ファイルでライセンスに関する詳細を確認してください。
