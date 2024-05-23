@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>Contact</h2>
    </div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}"/>
                    <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}"/>
                </div>
                <div class="form__error">
                    @error('last_name')
                        {{ $message }}
                    @enderror
                    <!-- 'last_name' のエラーがある場合は 'first_name' のエラーメッセージを表示しない -->
                    @if (!$errors->has('last_name'))
                        @error('first_name')
                            {{ $message }}
                        @enderror
                    @endif
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <input type="radio" name="gender" value="1" {{ old('gender', '1') == 1 ? 'checked' : '' }}> 男性
                    <input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}> 女性
                    <input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}> その他
                </div>
                <div class="form__error">
                    @error('gender')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}"/>
                </div>
                <div class="form__error">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="tel" name="tel_1" placeholder="090" value="{{ old('tel_1') }}"/> -
                    <input type="tel" name="tel_2" placeholder="1234" value="{{ old('tel_2') }}"/> -
                    <input type="tel" name="tel_3" placeholder="5678" value="{{ old('tel_3') }}"/>
                </div>
                <div class="form__error">
                    <!-- 「電話番号を入力してください」が優先して表示される -->
                    @if($errors->has('tel_1') && $errors->first('tel_1') === $priorityErrorMessage)
                        {{ $priorityErrorMessage }}
                    @elseif($errors->has('tel_2') && $errors->first('tel_2') === $priorityErrorMessage)
                        {{ $priorityErrorMessage }}
                    @elseif($errors->has('tel_3') && $errors->first('tel_3') === $priorityErrorMessage)
                        {{ $priorityErrorMessage }}
                    @elseif($errors->has('tel_1'))
                        {{ $errors->first('tel_1') }}
                    @elseif($errors->has('tel_2'))
                        {{ $errors->first('tel_2') }}
                    @elseif($errors->has('tel_3'))
                        {{ $errors->first('tel_3') }}
                    @endif
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}"/>
                </div>
                <div class="form__error">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}"/>
                </div>
                <div class="form__error">
                    <!-- nullable スタイリングを維持するために残してある -->
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__select">
                    <select name='category_id'>
                        <option value="" disabled selected hidden class="placeholder">選択してください</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__error">
                    @error('category_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__textarea">
                    <textarea name="detail" placeholder="資料をいただきたいです" >{{ old('detail') }}</textarea>
                </div>
                <div class="form__error">
                    @error('detail')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>

<!-- YYYY-MM-DD HH:MM:SS形式 -->
<!-- {{ \Carbon\Carbon::now()->toDateTimeString() }} -->

@endsection