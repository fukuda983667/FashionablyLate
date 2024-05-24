<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('username_match', function ($attribute, $value, $parameters, $validator) {
            $name = $parameters[0]; // nameフィールドの値
            $emailUsername = substr($value, 0, strpos($value, '@')); // メールアドレスのユーザー名部分

            return $name === $emailUsername;
        });

        Validator::replacer('username_match', function ($message, $attribute, $rule, $parameters) {
            return 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください';
        });
    }
}
