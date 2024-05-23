<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function showDashboard()
    {
        // categoriesテーブルが紐づいたContactテーブルを取得
        $contacts = Contact::with('category')->paginate(7);
        $categories = Category::all();

        return view('dashboard', compact('contacts', 'categories'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    public function search(Request $request)
    {
        // 部分一致検索
        $contacts = Contact::with('category')
            ->keywordSearch($request->input('keyword'))
            ->genderSearch($request->input('gender'))
            ->categorySearch($request->input('category_id'))
            ->dateSearch($request->input('date'))
            ->paginate(7)
            ->appends($request->except('page'));

        $categories = Category::all();
        return view('dashboard', compact('contacts', 'categories'));
    }

    public function export(Request $request)
    {
        $contacts = Contact::with('category')
            ->keywordSearch($request->input('keyword'))
            ->genderSearch($request->input('gender'))
            ->categorySearch($request->input('category_id'))
            ->dateSearch($request->input('date'))
            ->get();

        $filename = 'contacts_' . date('Ymd_His') . '.csv';

        $columns = [
            'お名前', '性別', 'メールアドレス', '電話番号', '住所', '建物名', 'お問い合わせの種類', 'お問い合わせ内容'
        ];

        $callback = function() use ($contacts, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($contacts as $contact) {
                fputcsv($file, [
                    $contact->last_name . '&emsp;' . $contact->first_name,
                    $contact->gender_text,
                    $contact->email,
                    $contact->tell,
                    $contact->address,
                    $contact->building,
                    $contact->category->content,
                    $contact->detail
                ]);
            }

            fclose($file);
        };

        return Response::stream($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }
}
