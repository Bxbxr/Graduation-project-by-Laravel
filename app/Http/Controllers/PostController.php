<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Psy\CodeCleaner\ReturnTypePass;
use App\Traits\ImageUploadTrait;

use function GuzzleHttp\Promise\all;

class PostController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $post;

    public function __construct(Post $post)
    {
        $this->middleware(['auth', 'verified','accepted']);

        $this->post = $post;
    }
    public function index()
    {
        $titleOfThePage = 'المنشورات الأكثر مشاهدة ';
        return view('posts.index', ['posts'=> Post::where('user_id', auth()->user()->id)->approved()->paginate(10), 'titleOfThePage'=> $titleOfThePage]);

        // return view('posts.index', compact('titleOfThePage', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'انشاء منشور جديد';
        return view('posts.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('image')){
            $image_name = $this->uploadImage($request->image);
        }
        $request->user()->posts()->create([
            'title'=> $request->title,
            'body'=>$request->body,
            'image_path'=>$image_name,
            'user_id'=>auth()->user()->id,

        ]);
        return back()->with('success', 'تم الحفظ بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->post->find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->post::find($id);
        return view('posts.edit', compact('post'));
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
        if($request->hasFile('image')){
            $request->user()->posts()->find($id)->update($request->except('image')+['image_path'=>$this->uploadImage($request->image)]);
        }else{
            $request->user()->posts()->find($id)->update($request->except('image'));
        }
        
        return back()->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->post->find($id);
        $post->delete();

        return back()->with('success', 'تم الحذف بنجاح');

    }
    public function channelPosts(User $channel)
    {
        $posts = Post::where('user_id',$channel->id)->get();
        $title = 'جميع المنشورات الخاصة بالمستخدم : '.  $channel->name;

        return view('posts.my-posts',compact('posts','title'));
    }

    public function channelLastPosts(User $channel)
    {
        $posts = Post::whereApproved(true)->latest()->get();
        $title = 'جميع المنشورات ';

        return view('posts.my-posts',compact('posts','title'));
    }
    public function search(Request $request)
    {
        $res = $this->post->where('body','LIKE','%'.$request->keyword.'%')->with('user:id,name')->approved()->paginate(10);

        return view('posts.my-videos',compact('res'));
    }

    public function allPosts(User $channel)
    {
        $posts = Post::whereApproved(true)->latest()->get();
        
        return view('admin.posts.all-posts',compact('posts'));
    }
    
}
