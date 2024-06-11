<?php

namespace App\Http\Controllers;

use App\Models\Lots;
use Illuminate\Http\Request;

class LotController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'description' => 'required|string',
            'image_path' => 'required|string',
            'price' => 'required|integer',
        ]);

        $lot = Lots::create([
            'user_id' => $request->user_id,
            'description' => $request->description,
            'image_path' => $request->image_path,
            'price' => $request->amount,
        ]);

        return response()->json($lot, 201);
    }
   public function getAllPosts()
    {
        $lots = Lots::all();
        foreach ($lots as $lot) {
            $imagePath = $lot->image_path;
            return view('myposts', compact('imagePath'));
        };
    }

    public function destroy(Request $request){
        $id = $request['post.id'];
        $post = Lots::find($id);
        if ($post) {
            $post->delete();
            $filePath = ('/home/preff1k3/kyrsovaya/public/images/' .  $request['post.path']);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            return back();
        }
    }
    public function randomPosts()
    {
        // Получаем три случайных поста
        $posts = Lots::inRandomOrder()->take(3)->get();

        // Возвращаем представление с этими постами
        return view('index', compact('posts'));
    }

    public function update_posts (Request $request){
        $id = $request['post.id'];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $post = Lots::find($id);
            $post->update([
                'image_path' => $imageName,
                'description' => $request['description']
            ]);
            $filePath = ('/home/preff1k3/kyrsovaya/public/images/' .  $request['post.image_path']);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            return redirect()->back();
        }
    }
}

