<?php
//2022.06.20de Lesson 13Chapter 8.3 MessagesController あっとindex
//https://techacademy.jp/my/php/laravel6/message-board#chapter-8-3
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Message;    // 追加

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでmessages/にアクセスされた場合の「一覧表示処理」
    // indexアクションの役割は、Messageのレコードの一覧表示です。
    public function index()
    {
        // メッセージ一覧を取得
        // $messages = Message::all();
        //$messages = Message::paginate(25); //indexでの表示件数が25件のみ
        
        // メッセージ一覧をidの降順で取得
        $messages = Message::orderBy('id', 'desc')->paginate(25);
        
        //messages.index は resources/views/messages/index.blade.php を意味します。第二引数にはそのViewに渡したいデータの配列を指定します。 
        //$messages = Message::all(); で $messages に入ったデータをViewに渡すためです。
        return view('messages.index', [
            'messages' => $messages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    
    //Lesson 13Chapter 8.4 MessagesController あっとcreate createアクションは、 POSTメソッドを送信する新規作成用の入力フォーム置き場になります。
    public function create()
    {   
        //Messageモデルのためのフォームなので、フォームの入力項目のために $message = new Message; でインスタンスを作成しています。
        $message = new Message;



        // メッセージ作成ビューを表示
        return view('messages.create', [
            'message' => $message,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // postでmessages/にアクセスされた場合の「新規登録処理」
    //Lesson 13Chapter 8.5 MessagesController あっとstore
    public function store(Request $request)
    {
        // バリデーションC13 C9.1 追記
        
        $request->validate([
            'title' => 'required|max:10',   // L13C10.2カラム追加 255から10文字に変更2022.07.01..1141TKT
            'content' => 'required|max:255', //required (カラでない）かつ max:255 (255文字を超えていない）であることを検証
        ]);
        
        // メッセージを作成
        $message = new Message;
        $message->title = $request->title;    // L13C10.2カラム追加
        $message->content = $request->content;
        $message->save();

        // トップページへリダイレクトさせる。Viewを返さずに / へリダイレクト（自動でページを移動）させています。 Viewを作成しても良いですが、わざわざ作成する必要もないでしょう。
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // getでmessages/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        // idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('messages.show', [
            'message' => $message,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // getでmessages/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
     public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('messages.edit', [
            'message' => $message,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // putまたはpatchでmessages/（任意のid）にアクセスされた場合の「更新処理」
    //Lesson 13Chapter 8.8 MessagesController あっとupdate
    public function update(Request $request, $id)
    {
        
        
        // バリデーション
        $request->validate([
            'title' => 'required|max:10',   // L13C10.2カラム追加 255から10文字に変更2022.07.01..1141TKT
            'content' => 'required|max:255',
        ]);
        
        // idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        // メッセージを更新
        $message->title = $request->title;    // L13C10.2カラム追加
        $message->content = $request->content;
        
        //dd($message);   // 追加 デバッグ用の関数 2022.06.30
        
        $message->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // deleteでmessages/（任意のid）にアクセスされた場合の「削除処理」
    //Lesson 13Chapter 8.9 MessagesController あっとdestroy
    public function destroy($id)
    {
        // idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        // メッセージを削除
        $message->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}
