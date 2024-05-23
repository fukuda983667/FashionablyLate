<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $priorityErrorMessage = '電話番号を入力してください';

        return view('index', compact('categories', 'priorityErrorMessage'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']);
        // 電話番号の結合と'tell'への格納
        $tell = $request->tel_1 . $request->tel_2 . $request->tel_3;
        // 性別の値を文字列に変換
        $gender_text = '';
        switch ($contact['gender']) {
            case 1:
                $gender_text = '男性';
                break;
            case 2:
                $gender_text = '女性';
                break;
            case 3:
                $gender_text = 'その他';
                break;
        }
        // 'category_id'に基づいてcategoryの'content'を取得
        $categoryContent = Category::find($contact['category_id'])->content;

        // 追加データを$contactに結合
        $additionalData = [
            'tell' => $tell,
            'gender_text' => $gender_text,
            'categoryContent' => $categoryContent,
        ];

        $contact = array_merge($contact, $additionalData);

        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        // セッショントークン再生成により二重送信対策
        $request->session()->regenerateToken();

        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tell', 'address', 'building', 'category_id', 'detail']);
        Contact::create($contact);

        return redirect()->route('thanks');
    }

    // PRGでthanksページの再読み込み時にstoreアクションが働かないようにしている
    public function thanks()
    {
        return view('thanks');
    }
}
