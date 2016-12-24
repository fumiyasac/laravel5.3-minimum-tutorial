<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

//モデルの宣言
use App\Topic;

class TopicsController extends Controller
{
    //バリデーションルールを定める（required|min:3は必須で最低3文字以上の意味）
    //バリデーションメッセージは resources/lang/ja/validation.phpを参照
    private $rule = [
        'title' => 'required|min:3',
        'body' => 'required',
        'eyecatch' => 'image|max:2000',
        'published' => 'required|date',
    ];

    //一覧
    public function index() {

        //Topicsテーブルのデータをすべて取得する
        $topics = Topic::all();
        return view('topics.index', compact('topics'));
    }

    //表示
    public function show($id) {

        //渡されたIDに紐づくTopicsテーブルのデータを取得する
        $topic = Topic::find($id);
        if ($topic) {
            return view('topics.show', compact('topic'));
        } else {
            \Session::flash('flash_message', 'ID:' . $id . 'に該当するデータはありませんでした。');
            return redirect('/');
        }
    }

    //追加
    public function add() {
        return view('topics.add');
    }

    public function create(Request $request) {

        //バリデーションを行う（正常：新規データ1件登録して一覧画面へ, 異常：メッセージを表示して入力画面へ）
        $this->validate($request, $this->rule);

        //新規データ1件登録
        Topic::create($request->all());

        //一覧画面へリダイレクト
        \Session::flash('flash_message', '新規データが正常に1件追加されました。');
        return redirect('/');
    }

    //編集
    public function edit($id) {

        //$idに該当するデータを1件取得する
        $topic = Topic::find($id);
        if ($topic) {
            return view('topics.edit', compact('topic'));
        } else {
            \Session::flash('flash_message', 'ID:' . $id . 'に該当するデータはありませんでした。');
            return redirect('/');
        }
    }

    public function update($id, Request $request) {

        //$idに該当するデータを1件取得する
        $topic = Topic::find($id);

        //バリデーションを行う（正常：IDに紐づくデータ1件を更新して一覧画面へ, 異常：メッセージを表示して入力画面へ）
        $this->validate($request, $this->rule);

        //既存データ1件更新
        $topic->fill($request->all())->save();

        //一覧画面へリダイレクト
        \Session::flash('flash_message', 'ID:' . $id . 'に該当するデータが1件更新されました。');
        return redirect('/');
    }

    //削除
    public function delete(Request $request) {

        //削除対象の$idを取得する
        $target_id = $request->id;

        //$idの形式が正しいかのチェック（注意：この部分は実際に使う場合はより厳密なチェックが必要）
        if ($target_id && is_numeric($target_id)) {

            //既存データ1件削除
            $topic = Topic::find($target_id);
            if ($topic) {
                $topic->delete();
            } else {
                \Session::flash('flash_message', 'ID:' . $target_id . 'に該当するデータはありませんでした。');
                return redirect('/');
            }

            //削除成功時のメッセージを表示
            \Session::flash('flash_message', 'ID:' . $target_id . 'に該当するデータが1件削除されました。');

        } else {

            //削除失敗時のメッセージを表示
            \Session::flash('flash_message', '削除処理が実行されませんでした。該当データをご確認ください。');
        }

        //一覧画面へリダイレクト
        return redirect('/');
    }
}
