@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection

@section('content')

<div class="dashboard__content">
    <div class="dashboard__heading">
        <h2>Admin</h2>
    </div>

    <form action="/admin/search" class="form__contact--search" method="get">
        @csrf
        <div class="form__input--text">
            <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}" />
        </div>
        <div class="form__select">
            <select class="form__select--gender" name='gender'>
                <option value="" disabled selected hidden class="placeholder">性別</option>
                <option value="0" {{ request('gender') == "0" ? 'selected' : '' }}>全て</option>
                <option value="1" {{ request('gender') == "1" ? 'selected' : '' }}>男性</option>
                <option value="2" {{ request('gender') == "2" ? 'selected' : '' }}>女性</option>
                <option value="3" {{ request('gender') == "3" ? 'selected' : '' }}>その他</option>
            </select>
        </div>
        <div class="form__select">
            <select class="form__select--category" name='category_id'>
                <option value="" disabled selected hidden class="placeholder">お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{ $category['id'] }}" {{ request('category_id') == $category['id'] ? 'selected' : '' }}>{{ $category['content'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="form__input--date">
            <input type="date" name="date" value="{{ request('date') }}">
        </div>
        <div class="form__button--search">
            <button class="form__button--submit" type="submit">検索</button>
        </div>
        <div class="form__button--reset">
            <a href="/admin" class="form__button--redirect" type="button">リセット</a>
        </div>
    </form>
    <div class="pagination-export__content">
        <form class="form__button--export" action="/admin/export" method="get">
            @csrf
            <input type="hidden" name="keyword" value="{{ request('keyword') }}">
            <input type="hidden" name="gender" value="{{ request('gender') }}">
            <input type="hidden" name="category_id" value="{{ request('category_id') }}">
            <input type="hidden" name="date" value="{{ request('date') }}">
            <button class="form__button--submit" type="submit">エクスポート</button>
        </form>
        <div class="pagination">
            {{ $contacts->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>



    <table class="contact-table">
        <tr class="contact-table__row">
            <th class="contact-table__header">お名前</th>
            <th class="contact-table__header">性別</th>
            <th class="contact-table__header">メールアドレス</th>
            <th class="contact-table__header">お問い合わせの種類</th>
            <th class="contact-table__header">詳細</th>
        </tr>
        @foreach ($contacts as $contact)
        <tr class="contact-table__row">
            <td class="contact-table__data">{{ $contact['last_name'] }}&emsp;{{ $contact['first_name'] }}</td>
            <td class="contact-table__data">{{ $contact['gender_text'] }}</td>
            <td class="contact-table__data">{{ $contact['email'] }}</td>
            <td class="contact-table__data category">{{ $contact['category']['content'] }}</td>
            <td class="contact-table__data">
                <button class="modal-open__button" popovertarget="Modal{{ $contact['id'] }}" popovertargetaction="show">詳細</button>
            </td>
        </tr>
        @endforeach
    </table>
</div>


@foreach ($contacts as $contact)
<div id="Modal{{ $contact['id'] }}" popover="auto">
    <div class="inner-modal">
        <button class="modal-close__button" popovertarget="Modal{{ $contact['id'] }}" popovertargetaction="hidden">
            <span>&times;</span>
        </button>
        <table class="detail-table">
            <tr class="detail-table__row">
                <th class="detail-table__header">お名前</th>
                <td class="detail-table__data">{{ $contact['last_name'] }}&emsp;{{ $contact['first_name'] }}</td>
            </tr>
            <tr class="detail-table__row">
                <th class="detail-table__header">性別</th>
                <td class="detail-table__data">{{ $contact['gender_text'] }}</td>
            </tr><tr class="detail-table__row">
                <th class="detail-table__header">メールアドレス</th>
                <td class="detail-table__data">{{ $contact['email'] }}</td>
            </tr><tr class="detail-table__row">
                <th class="detail-table__header">電話番号</th>
                <td class="detail-table__data">{{ $contact['tell'] }}</td>
            </tr><tr class="detail-table__row">
                <th class="detail-table__header">住所</th>
                <td class="detail-table__data">{{ $contact['address'] }}</td>
            </tr><tr class="detail-table__row">
                <th class="detail-table__header">建物名</th>
                <td class="detail-table__data">{{ $contact['building'] }}</td>
            </tr><tr class="detail-table__row">
                <th class="detail-table__header">お問い合わせの種類</th>
                <td class="detail-table__data">{{ $contact['category']['content'] }}</td>
            </tr><tr class="detail-table__row">
                <th class="detail-table__header">お問い合わせ内容</th>
                <td class="detail-table__data">{{ $contact['detail'] }}</td>
            </tr>
        </table>

        <form action="/admin/destroy" class="form__delete" method="post">
            @csrf
            @method('DELETE')
            <div class="form__button--delete">
                <button class="form__button--submit" type="submit" name="id" value="{{ $contact['id'] }}">削除</button>
            </div>
        </form>
    </div>
</div>
@endforeach

@endsection