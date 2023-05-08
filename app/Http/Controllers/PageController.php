<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.pages.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->page->create($request->all()+ ['user_id',auth()->user()->id]);
        return back()->with(
            'success',
            'تم تعديل بيانات الفيديو بنجاح برو',
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($title)
    {
        $userId = auth()->user()->id;
        $page = $this->page->whereTitle($title)->where('user_id', $userId)->first();

        return view('pages.show', compact('page'));
    }
    public function allPages(User $user)
    {
        $pages = Page::all();
         return view('admin.users.pages.allpages',compact('pages'));
    }


}
