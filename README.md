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

## ER図

![ER](https://github.com/fukuda983667/FashionablyLate/assets/163486989/d3c3b1af-4328-4bee-8f4d-ba02cf23208f)
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="501px" height="331px" viewBox="-0.5 -0.5 501 331" content="&lt;mxfile&gt;&lt;diagram id=&quot;sSKK1_jfalgC6bCXtDJx&quot; name=&quot;ページ1&quot;&gt;7Z3Rjto4FIafhstWcUKYcLnQaVfqVFvNVNr2qvJgEyyZGDlmgHn6tRM7AQxtsgNpcCKNqvjENsn5Tz7jg50Oguly+4nD1eILQ5gOfA9tB8GHge/7o7H8Vxl2ueFd4OWGmBOUm0BpeCKvWBtNtTVBOD2oKBijgqwOjTOWJHgmDmyQc7Y5rDZn9PBTVzDGluFpBqlt/ZcgscitkX9X2v/GJF6YTwbmhpfQVNZ3ki4gYps9U3A/CKacMZEfLbdTTJXvjF/ydh/PnC0ujONEVGlwN8xbvEC61jc3ZYmAM5HqCxQ7c9fyWlfqUMBnZZqkAnKhxZECBpOZakkSzKUBZGVK4SolWfXcsiAUPcAdWwvTkSlN5mSL0WOujaorZXqQnami6nwuO3/SF6NOQ0riRB7P5J2qT5xwnMpreYCp0DVsX2j3vGAu8HbPpH3zCbMlFnwnq5izI62TDlTgD7VhU+oOIm1b7GkemJCGOtbiovNSDnmgFTmjTmip82tVHlUsTRaMk1elBdW+21cqK2/IksJEBilER6YJyx7KzOOE0imjTMmZsARbiqpKiLPVN8hjLLRhxUgisnsOJ/JPemHqvQ8HobzWqSyDsiz/VHUuZMSlgsvIUX1gKeAGKxEngq10pxTPTf9c+1gdPzMh2PKs3EVw/15vrW9QVd1LiDuyxP36+ay88r4EgfRR4gwmMc3FyOgGSzFOKHbSh4Xfjh16/JAx6bo5zQC1IAjh5LSfw8p+3nNsUNOvurPSA7V7g1SSIoFCBvk6QaklVnGd1fS7s/STp/6sfgaKed1JuoIzksQPecvRkcDhNQTenn+QwosKXqm7Cyse9TiuhGPvQjgeNYnjsSXuxz+NY4yI6a8GjaPKbnaIxiYs9uSbyb5jvvvZfipfXFiXKRwBS+mewtek8LhBCkd+dXFbzOCo+kzTJQYHlnhzwlPxM4FL7AaDawjrNIPttFHP4GsyGPhNQrhG2qnNEK7uZZcgbKeVKHSLwdV1dZnBAIx75l6VuWGDzC0Af1uMLYKwW5AFvj0JjXGCMHcDsXVkdZqx/ffaKzM2apSxwU0y1gRh1xhrTzLxEhLqCGJrqOo2YsMesddEbLFqqhnEjm4TsZ1cwgB8ew2DyKq4Qdh+2ULuh6gn7FUJW3lR4EUIez7t02rCdnJZAjDd7xEWIsRxen597Y1Btl+VkAsNesheFbJ3TUI2OJ/3aTNkg06uOwCBvfDgeU0okkBzhLI1hHWbssOestekbOA1StnzqZ9WU7aTCwtAYK8sQFi4k5CtIavLjI3snFC2kloyFfebAuWZoeFh7U2B4wtAM+o3oVQbEk+rXUR3K/cERvYmlBvdExh1Mt1jHvAO7AmsIbDLo+W4343ylhlKfRw3uSdw7FcXt8UTlnEns0JjOymkvosqr7QcyBdX1WUAA88ec9cp5un51e5dnqsMq24kKaR8U4bH64fHt8xWyuBu5XQFePYAeaPzlTJSOzVIAs8eJV2dsdSR2O0Rs9+9+ZY5y/+AcpOTFuC5sX2zDNOOEdn+mcWdvZt1RHWbwXc9cq+K3CbfWgK8Gj/KtBq51dNxTiHX/tnFpZ1GNVR1mrlmI0z/vbcpCDf62hIAaiSb2kxhUN3PLlEY2MmkFUzTDeOtT0hcXlinQRzaUxxLYYxibHI80oNE7B4xhYKw5L48k2eCchLL8JGsFkuqHzacoL/Uu95l8f7xFXP2jX2Byc7wuzy3hAn6J4sK+Tl8971oLws/VAS8D03xw9Y82FnJoB1vifi+d7zXSpbKRqpg2pwID+0DtuYz7QTzI7swQ8KgfBmvclBVNhToPsjwGyPPHPuCDy7jF5H0VY1JZYyOjl+SHgyPwie/Jd2sDB2rp+C4p+HoqKfcEVZPvw9CWSzfqp9XL/9rguD+Pw==&lt;/diagram&gt;&lt;/mxfile&gt;"><defs><clipPath id="mx-clip-0-30-30-30-0"><rect x="0" y="30" width="30" height="30"/></clipPath><clipPath id="mx-clip-36-30-144-30-0"><rect x="36" y="30" width="144" height="30"/></clipPath><clipPath id="mx-clip-0-60-30-30-0"><rect x="0" y="60" width="30" height="30"/></clipPath><clipPath id="mx-clip-36-60-144-30-0"><rect x="36" y="60" width="144" height="30"/></clipPath><clipPath id="mx-clip-36-90-144-30-0"><rect x="36" y="90" width="144" height="30"/></clipPath><clipPath id="mx-clip-36-120-144-30-0"><rect x="36" y="120" width="144" height="30"/></clipPath><clipPath id="mx-clip-36-150-144-30-0"><rect x="36" y="150" width="144" height="30"/></clipPath><clipPath id="mx-clip-36-180-144-30-0"><rect x="36" y="180" width="144" height="30"/></clipPath><clipPath id="mx-clip-36-210-144-30-0"><rect x="36" y="210" width="144" height="30"/></clipPath><clipPath id="mx-clip-36-240-144-30-0"><rect x="36" y="240" width="144" height="30"/></clipPath><clipPath id="mx-clip-36-270-144-30-0"><rect x="36" y="270" width="144" height="30"/></clipPath><clipPath id="mx-clip-36-300-144-30-0"><rect x="36" y="300" width="144" height="30"/></clipPath><clipPath id="mx-clip-320-30-30-30-0"><rect x="320" y="30" width="30" height="30"/></clipPath><clipPath id="mx-clip-356-30-144-30-0"><rect x="356" y="30" width="144" height="30"/></clipPath><clipPath id="mx-clip-356-60-144-30-0"><rect x="356" y="60" width="144" height="30"/></clipPath><clipPath id="mx-clip-320-210-30-30-0"><rect x="320" y="210" width="30" height="30"/></clipPath><clipPath id="mx-clip-356-210-144-30-0"><rect x="356" y="210" width="144" height="30"/></clipPath><clipPath id="mx-clip-356-240-144-30-0"><rect x="356" y="240" width="144" height="30"/></clipPath><clipPath id="mx-clip-356-270-144-30-0"><rect x="356" y="270" width="144" height="30"/></clipPath><clipPath id="mx-clip-356-300-144-30-0"><rect x="356" y="300" width="144" height="30"/></clipPath></defs><g><path d="M 0 30 L 0 0 L 180 0 L 180 30" fill="rgb(255, 255, 255)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="all"/><path d="M 0 30 L 0 330 L 180 330 L 180 30" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="none"/><path d="M 0 30 L 180 30" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="none"/><path d="M 30 30 L 30 60 L 30 90 L 30 120 L 30 150 L 30 180 L 30 210 L 30 240 L 30 270 L 30 300 L 30 330" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" font-weight="bold" pointer-events="none" text-anchor="middle" font-size="12px"><text x="89.5" y="19.5">Contacts</text></g><path d="M 0 30 M 180 30 M 180 60 L 0 60" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 0 30 M 30 30 M 30 60 M 0 60" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" font-weight="bold" pointer-events="none" clip-path="url(#mx-clip-0-30-30-30-0)" text-anchor="middle" font-size="12px"><text x="14.5" y="49.5">PK</text></g><path d="M 30 30 M 180 30 M 180 60 M 30 60" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" font-weight="bold" text-decoration="underline" pointer-events="none" clip-path="url(#mx-clip-36-30-144-30-0)" font-size="12px"><text x="37.5" y="49.5">id</text></g><path d="M 0 60 M 30 60 M 30 90 M 0 90" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" pointer-events="none" clip-path="url(#mx-clip-0-60-30-30-0)" text-anchor="middle" font-size="12px"><text x="14.5" y="79.5">FK</text></g><path d="M 30 60 M 180 60 M 180 90 M 30 90" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" pointer-events="none" clip-path="url(#mx-clip-36-60-144-30-0)" font-size="12px"><text x="37.5" y="79.5">categry_id</text></g><path d="M 0 90 M 30 90 M 30 120 M 0 120" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 30 90 M 180 90 M 180 120 M 30 120" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" pointer-events="none" clip-path="url(#mx-clip-36-90-144-30-0)" font-size="12px"><text x="37.5" y="109.5">first_name</text></g><path d="M 0 120 M 30 120 M 30 150 M 0 150" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 30 120 M 180 120 M 180 150 M 30 150" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" pointer-events="none" clip-path="url(#mx-clip-36-120-144-30-0)" font-size="12px"><text x="37.5" y="139.5">last_name</text></g><path d="M 0 150 M 30 150 M 30 180 M 0 180" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 30 150 M 180 150 M 180 180 M 30 180" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" pointer-events="none" clip-path="url(#mx-clip-36-150-144-30-0)" font-size="12px"><text x="37.5" y="169.5">gender</text></g><path d="M 0 180 M 30 180 M 30 210 M 0 210" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 30 180 M 180 180 M 180 210 M 30 210" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" pointer-events="none" clip-path="url(#mx-clip-36-180-144-30-0)" font-size="12px"><text x="37.5" y="199.5">email</text></g><path d="M 0 210 M 30 210 M 30 240 M 0 240" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 30 210 M 180 210 M 180 240 M 30 240" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" pointer-events="none" clip-path="url(#mx-clip-36-210-144-30-0)" font-size="12px"><text x="37.5" y="229.5">tell</text></g><path d="M 0 240 M 30 240 M 30 270 M 0 270" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 30 240 M 180 240 M 180 270 M 30 270" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" pointer-events="none" clip-path="url(#mx-clip-36-240-144-30-0)" font-size="12px"><text x="37.5" y="259.5">address</text></g><path d="M 0 270 M 30 270 M 30 300 M 0 300" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 30 270 M 180 270 M 180 300 M 30 300" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" pointer-events="none" clip-path="url(#mx-clip-36-270-144-30-0)" font-size="12px"><text x="37.5" y="289.5">building</text></g><path d="M 0 300 M 30 300 M 30 330 M 0 330" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 30 300 M 180 300 M 180 330 M 30 330" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" pointer-events="none" clip-path="url(#mx-clip-36-300-144-30-0)" font-size="12px"><text x="37.5" y="319.5">detail</text></g><path d="M 320 30 L 320 0 L 500 0 L 500 30" fill="rgb(255, 255, 255)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="none"/><path d="M 320 30 L 320 90 L 500 90 L 500 30" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="none"/><path d="M 320 30 L 500 30" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="none"/><path d="M 350 30 L 350 60 L 350 90" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" font-weight="bold" pointer-events="none" text-anchor="middle" font-size="12px"><text x="409.5" y="19.5">categories</text></g><path d="M 320 30 M 500 30 M 500 60 L 320 60" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 320 30 M 350 30 M 350 60 M 320 60" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" font-weight="bold" pointer-events="none" clip-path="url(#mx-clip-320-30-30-30-0)" text-anchor="middle" font-size="12px"><text x="334.5" y="49.5">PK</text></g><path d="M 350 30 M 500 30 M 500 60 M 350 60" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" font-weight="bold" text-decoration="underline" pointer-events="none" clip-path="url(#mx-clip-356-30-144-30-0)" font-size="12px"><text x="357.5" y="49.5">id</text></g><path d="M 320 60 M 350 60 M 350 90 M 320 90" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 350 60 M 500 60 M 500 90 M 350 90" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" pointer-events="none" clip-path="url(#mx-clip-356-60-144-30-0)" font-size="12px"><text x="357.5" y="79.5">content</text></g><path d="M 320 210 L 320 180 L 500 180 L 500 210" fill="rgb(255, 255, 255)" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="none"/><path d="M 320 210 L 320 330 L 500 330 L 500 210" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="none"/><path d="M 320 210 L 500 210" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="none"/><path d="M 350 210 L 350 240 L 350 270 L 350 300 L 350 330" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" font-weight="bold" pointer-events="none" text-anchor="middle" font-size="12px"><text x="409.5" y="199.5">userse</text></g><path d="M 320 210 M 500 210 M 500 240 L 320 240" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 320 210 M 350 210 M 350 240 M 320 240" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" font-weight="bold" pointer-events="none" clip-path="url(#mx-clip-320-210-30-30-0)" text-anchor="middle" font-size="12px"><text x="334.5" y="229.5">PK</text></g><path d="M 350 210 M 500 210 M 500 240 M 350 240" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" font-weight="bold" text-decoration="underline" pointer-events="none" clip-path="url(#mx-clip-356-210-144-30-0)" font-size="12px"><text x="357.5" y="229.5">id</text></g><path d="M 320 240 M 350 240 M 350 270 M 320 270" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 350 240 M 500 240 M 500 270 M 350 270" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" pointer-events="none" clip-path="url(#mx-clip-356-240-144-30-0)" font-size="12px"><text x="357.5" y="259.5">name</text></g><path d="M 320 270 M 350 270 M 350 300 M 320 300" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 350 270 M 500 270 M 500 300 M 350 300" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" pointer-events="none" clip-path="url(#mx-clip-356-270-144-30-0)" font-size="12px"><text x="357.5" y="289.5">email</text></g><path d="M 320 300 M 350 300 M 350 330 M 320 330" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><path d="M 350 300 M 500 300 M 500 330 M 350 330" fill="none" stroke="rgb(0, 0, 0)" stroke-linecap="square" stroke-miterlimit="10" pointer-events="none"/><g fill="rgb(0, 0, 0)" font-family="Helvetica" pointer-events="none" clip-path="url(#mx-clip-356-300-144-30-0)" font-size="12px"><text x="357.5" y="319.5">password</text></g><path d="M 320 45 L 300 45 Q 290 45 280 45 L 220 45 Q 210 45 200 45 L 180 45" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="none"/><path d="M 316 49 L 316 41 M 312 49 L 312 41" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="none"/><ellipse cx="192" cy="45" rx="3" ry="3" fill="#ffffff" stroke="rgb(0, 0, 0)" pointer-events="none"/><path d="M 180 49 L 188 45 L 180 41" fill="none" stroke="rgb(0, 0, 0)" stroke-miterlimit="10" pointer-events="none"/></g></svg>

## URL

- 開発環境 : http://localhost/
- お問い合わせフォーム入力ページ : http://localhost/
- お問い合わせフォーム確認ページ : http://localhost/confirm
- サンクスページ : http://localhost/thanks
- 管理画面 : http://localhost/admin
- ユーザ登録ページ : http://localhost/register
- ログインページ : http://localhost/login

## 未実装

- confirm.blade.php 74行目  
「修正」ボタンを押して入力内容保持したまま前の画面に戻るために`onclick=history.back()`としているがjavascriptだった。

- fortify register  
ユーザ登録後に自動でログインしてしまう。自動ログインの処理をスキップ(無効)させたかった。

- fortify login,registerバリデーションルール
FormRequestを継承したリクエストクラスを新規作成して、これを適用しなければいけなかった？

