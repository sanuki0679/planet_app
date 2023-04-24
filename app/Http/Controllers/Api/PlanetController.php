<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanetRequest;
use App\Models\Planet;

class PlanetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planets = Planet::all();
        return $planets;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanetRequest $request)
    {
        // インスタンスの作成
        $planet = new Planet;

        // 値の用意
        $planet->name = $request->name;
        $planet->enname = $request->enname;
        $planet->radius = $request->radius;
        $planet->weight = $request->weight;

        // インスタンスに値を設定して保存
        $planet->save();

        // 登録後のデータを返す（idが追加される)
        return $planet;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Planetモデルから1件を取得
        $planet = Planet::find($id);
        return $planet;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanetRequest $request, $id)
    {
        // ここはidで探して持ってくる以外はstoreと同じ
        $planet = Planet::find($id);

        // 値の用意
        $planet->name = $request->name;
        $planet->enname = $request->enname;
        $planet->radius = $request->radius;
        $planet->weight = $request->weight;

        // インスタンスに値を設定して保存
        $planet->save();

        // 登録後のデータを返す（idが追加される)
        return $planet;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $planet = Planet::find($id);
        $planet->delete();
    }
}
