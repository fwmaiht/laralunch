<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LunchRec;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\services\CheckFormData;
use App\Http\Requests\ShopContactForm;

class LunchListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lunch_recs = DB::table('lunch-recs')
        ->select('id', 'shop_name', 'genre', 'price', 'created_at', 'image')
        ->get();

        $nice_shops = DB::table('nices')
        ->select('lunch_rec_id')
        ->where('user_id', Auth::id())
        ->get();

        $nice_shop_id = [];
        foreach ($nice_shops as $nice_shop) {
            array_push($nice_shop_id, $nice_shop->lunch_rec_id);
        }

        $random_shop = Lunchrec::inRandomOrder()
        ->find($nice_shop_id)
        ->first();

        return view('lunch.index', compact('lunch_recs', 'random_shop'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lunch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(ShopContactForm $request)
    {
        $id = Auth::id();
        $Lunch = new LunchRec;
        $image = $request->file('image');

        if($request->hasFile('image')) {
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
        } else {
            $path = null;
        }

        $Lunch->shop_name = $request->input('shop_name');
        $Lunch->price = $request->input('price');
        $Lunch->genre = $request->input('genre');
        $Lunch->register = $id;
        $Lunch->image = $path[1];

        $Lunch->save();

        return redirect('lunch/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Lunch = LunchRec::find($id);
        $genre = CheckFormData::selectGenre($Lunch);
        $name = DB::table('users')
        ->select('name')
        ->find($Lunch->register);

        // $comments = DB::table('comments')//コメントテーブルを取得
        // ->select('comment', 'user_id')//コメントカラムを指定（無くてもいい）
        // ->where('shop_id', strval($Lunch->id))//shop_idが$Lunchのidに一致するものを指定。strvalは文字列への変換
        // ->get();//データ取得

        $comments = Comment::with('user')
        ->where('shop_id', strval($Lunch->id))
        ->get();

        return view('lunch.show', compact('Lunch', 'genre', 'name', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Lunch = LunchRec::find($id);
        return view('lunch.edit', compact('Lunch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image = $request->file('image');

        if($request->hasFile('image')) {
            $path = \Storage::put('/public', $image);
            $path = explode('/', $path);
        } else {
            $path = null;
        }

        // editからデータを受け取る
        $Lunch = LunchRec::find($id);

        $Lunch->shop_name = $request->input('shop_name');
        $Lunch->price = $request->input('price');
        $Lunch->genre = $request->input('genre');
        $Lunch->image = $path[1];

        // 受け取ったデータを保存する
        $Lunch->save();

        return redirect('lunch\index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Lunch = LunchRec::find($id);
        $Lunch->delete();

        return redirect('lunch\index');
    }
}
