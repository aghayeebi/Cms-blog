<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;

use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['gallery','Category'])->get();
        return view('auth.posts.index',['posts'=> $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();

        return view('auth.posts.create', ['category' => $category]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        try {

            \DB::beginTransaction();

            if ($request->has('file')) {
                $file = $request->file;
                $filename = time() . ' - ' . $file->getClientOriginalname();
                $imagePath = 'images/posts';
                $file->store($imagePath);
                $gallery = Gallery::query()->create([
                    'image' => $filename
                ]);
            }
            Post::query()->create([
                'category_id' => $request->category,
                'gallery_id' => $gallery->id,
                'is_publish' => $request->is_publish,
                'title' => $request->title,
                'description' => $request->description,
            ]);
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollBack();
            return $e->getMessage();
        }

        $request->session()->flush('alert-success', 'Post Created Successfully' );
        return to_route('posts.index');
        return 'success';

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
