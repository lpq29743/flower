<?php

namespace App\Http\Controllers;

use App\Flower;
use App\ShopList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class FlowerController extends Controller
{
    public function flowerAdd()
    {
        return view('floweradd');
    }

    public function flowerAddPost(Request $request)
    {
        $flowers = Flower::where('flowerID', Input::get('flowerID'))
            ->get();
        if (!sizeof($flowers)) {
            $flower = new Flower();
            $flower->flowerID = $request->flowerID;
            $flower->fname = $request->fname;
            $flower->myclass = $request->myclass;
            $flower->fclass = $request->fclass;
            $flower->fclass1 = $request->fclass1;
            $flower->cailiao = $request->cailiao;
            $flower->baozhuang = $request->baozhuang;
            $flower->huayu = $request->huayu;
            $flower->shuoming = $request->shuoming;
            $flower->price = $request->price;
            $flower->yourprice = $request->yourprice;
            $flower->tejia = $request->tejia;
            $flower->SelledNum = 0;

            $files = $request->file('picture');
            $flower->pictures = $files[0]->getClientOriginalName();
            $flower->picturem = $files[1]->getClientOriginalName();
            $flower->pictureb = $files[2]->getClientOriginalName();
            $flower->pictured = $files[3]->getClientOriginalName();
            $flower->cailiaopicture = $files[4]->getClientOriginalName();
            $flower->bzpicture = $files[5]->getClientOriginalName();
            foreach ($files as $key => $file) {
                $savePath = "flowerpictures/" . $file->getClientOriginalName();
                Storage::put($savePath, File::get($file));
            }

            $flower->save();
            return Redirect::to('adminFlower');
        } else {
            return Redirect::to('flowerAdd')->with('message', '此编号已存在')->withInput();
        }
    }

    public function check($var)
    {
        return ($var != "");
    }

    public function showFlower()
    {
        $flowers = Flower::paginate(10);
        return view('showflower', compact('flowers'));
    }

    public function getFlowerImg($name)
    {
        return Storage::get("flowerpictures/" . $name);
    }

    public function flowerDetail()
    {
        $flower = Flower::where('flowerID', Input::get('flowerID'))
            ->first();
        $shoplists = DB::table('shoplist')
            ->where('shoplist.flowerID', Input::get('flowerID'))
            ->where('star', '!=', NULL)
            ->join('myorder', 'myorder.orderID', '=', 'shoplist.orderID')
            ->get();
        return view('flowerdetail', compact('flower', 'shoplists'));
    }

    public function flowerUpdate(Request $request)
    {
        Flower::where('flowerID', $request->flowerID)
            ->update(['yourprice' => $request->yourprice]);
        return Redirect::to('adminFlower')->with('message', '更新成功')->withInput();
    }

    public function flowerDelete(Request $request)
    {
        Flower::where('flowerID', $request->flowerID)->delete();
        return Redirect::to('adminFlower')->with('message', '删除成功')->withInput();
    }

}
