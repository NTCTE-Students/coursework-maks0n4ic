<?php

namespace App\Http\Controllers;
use App\Models\bets;
use App\Models\buys;
use Illuminate\Http\Request;
use App\Models\Lots;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        // Получаем текущего пользователя (автора)
        $user = auth()->user();

        // Сохраняем изображение
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            // Создаем новый лот и связываем с пользователем
            $post = new Lots();
            $post->user_id = $user->id; // ID текущего пользователя
            $post->image_path = $imageName;
            $post->description = $request['description']; // Путь к изображению
            $post->price = $request['price'];
            $post->save();

            return redirect()->back();
        }

        return redirect()->back()->with('error', 'Ошибка при загрузке изображения.');
    }
    public function show($param = null)
    {
        if($param){
            if($param == 'up'){
                $images = Lots::orderBy('price', 'desc')->get();
            } else{
                $images = Lots::orderBy('price', 'asc')->get();
            }
            return view('lots', compact('images'));
        } else{
            $images = Lots::orderBy('id', 'desc')->get();

            return view('lots', compact('images'));
        }
    }

    public function show_lot(Lots $id){
        return view("lot",[
            'lots'=>$id]);
    }

    public function update_lot (Request $request, Lots $id){
        $price = $request->bet;
        if($price>$id->price){
            $id->price = $price;
            $id->save();
            $bet = new bets;
            $bet->user_id = $request->user()->id;
            $bet->lot_id = $id->id;
            $bet->price = $price;
            $bet->save();
            return view("lot",[
                'lots'=>$id])
                ->with('success', 'Вы перебили цену');
        }
        return view("lot",[
            'lots'=>$id]);
    }

    public function buy_lot(Request $request, Lots $id){
        $id->buy = true;
        $id->save();
        $buy = new buys;
        $buy->user_id = $request->user()->id;
        $buy->lot_id = $id->id;
        $buy->save();
        return redirect('/lots');
    }
}
