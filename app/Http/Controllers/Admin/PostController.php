<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $data = [
            'posts' => $posts
        ];

        return view('admin.posts.index', $data);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $category = Category::all();

        $data = [
            'categories' => $category
        ];

        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $request->validate($this->validationRules());   
        $form_data = $request->all();
        
        $new_post = new Post();
        $new_post->fill($form_data);
        $new_post->slug = $this->uniqueSlug($new_post->title);

        $new_post->save();

        return redirect()->route('admin.posts.show', ['post' => $new_post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);

        $data = [
            'post' => $post
        ];

        return view('admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $category = Category::all();

        $data = [
            'post' => $post,
            'categories' => $category
        ];

        return view('admin.posts.edit', $data);
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
        $request->validate($this->validationRules()); 

        $form_data = $request->all();
        $post_to_update = Post::findOrFail($id);

        if($form_data['title'] !== $post_to_update->title) {
            $post_to_update->slug = $this->uniqueSlug($post_to_update->title);
        } else {
            $post_to_update->slug = $form_data['title'];
        }

        $post_to_update->update($form_data);


        return redirect()->route('admin.posts.show', ['post' => $post_to_update->id]);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post_delete = Post::findOrFail($id);
        $post_delete->delete();

        return redirect()->route('admin.posts.index');
    }


    public function uniqueSlug($title) {
        $slug_to_save = Str::slug($title, '-');
        $slug_base = $slug_to_save;
        $existing_slug_post = Post::where('slug', '=', $slug_to_save)->first();

        $counter = 1;

        while($existing_slug_post)  {
            $slug_to_save = $slug_base . '—' . $counter;
            $existing_slug_post = Post::where('slug', '=', $slug_to_save)->first();

            $counter++;
        }

        return $slug_to_save;

    }

    protected function validationRules() {
        return [
            'title' => 'required|max:50',
            'content' => 'required|max:60000',
            
        ];
    }
}
