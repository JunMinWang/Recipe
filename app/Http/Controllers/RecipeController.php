<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App;
use Auth;
use Carbon\Carbon;

class RecipeController extends Controller {
    /*
    / 取得單一食譜
    */
    public function getRecipe($id) {
      $recipe = DB::collection('recipes')->where('_id', $id)->get();
      return view('RecipeOperate.recipe', compact('recipe'));
    }

    /*
    / 建立食譜表單
    */
    public function getCreateRecipe() {
      return view('RecipeOperate.createForm');
    }

    /*
    / 建立食譜操作
    */
    public function postCreateRecipe(Request $request) {
      $ingredients = mb_split('\s', $request->ingredients);
      DB::collection('recipes')->insert([
        'name' => $request->recipename,
        'description' => $request->description,
        'ingredients' => $ingredients,
        'imgsrc' => $request->imgsrc,
        'uid' => Auth::id(),
        'uname' => Auth::user()->name,
        "create_at" => Carbon::now()->format('Y-m-d H:i:s')
      ]);
      return redirect()->route('home');
    }

    /*
    / 移除單一食譜
    */
    public function getRemoveRecipe($id) {
      DB::collection('recipes')->where('_id', $id)->where('uid', Auth::id())->delete();
      return redirect()->route('home');
    }

    /*
    / 修改食譜表單
    */
    public function getModifyRecipe($id) {
      $recipe = DB::collection('recipes')->where('_id', $id)->get();
      if($recipe[0]['uid']==Auth::id()) {
        return view('RecipeOperate.modifyForm', compact('recipe'));
      }
      abort(403);
    }

    /*
    / 修改食譜操作
    */
    public function postModifyRecipe(Request $request) {
      $ingredients = mb_split('\s', $request->ingredients);
       DB::collection('recipes')->where('_id', $request->_id)
         ->update([
          'name' => $request->recipename,
          'description' => $request->description,
          'ingredients' => $ingredients,
          'imgsrc' => $request->imgsrc
         ]);
       return redirect()->route('home');
    }
}
