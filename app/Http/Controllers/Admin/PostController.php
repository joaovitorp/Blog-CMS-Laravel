<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\Post;
use App\Models\admin\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $Post;
    public $Cat;
    public function __construct(Post $post,Category $cat)
    {
        $this->Post = $post;
        $this->Cat = $cat;
    }
    public function index()
    {
        $post = $this->Post->paginate(10);
       
        return view("admin.post.manage",compact("post"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cat = $this->Cat->all();
        return view("admin.post.add",compact("cat"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|min:10',
            'category' => 'required',
            'thumb' => 'required|file|image|mimes:jpeg,jpg,png|max:2000|dimensions:min_width=50,min_height=50,max_width=1000,max_height=1000',

        ]);
        if($request->hasFile('thumb') && $request->file('thumb')->isValid()){
            if($this->Post->setPost($request)){
                return redirect()->route("admin.post.add")->with('status', 'Adicionado com sucesso!');
            }
        }   
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post =  $this->Post->find($id);
        if($post){
            return view("templates.default.Read",compact("post"));
        }else{
            return redirect(route("home"));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = $this->Cat->all();
        $posts = $this->Post->find($id);
        $checked = explode(",",$posts->category);
        $e = 0;
        return view("admin.post.add",compact("posts","cat","checked","e"));
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
        //
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|min:10',
            'category' => 'required',
            'thumb' => 'file|image|mimes:jpeg,jpg,png|max:2000|dimensions:min_width=50,min_height=50,max_width=1000,max_height=1000',

        ]);
        if($this->Post->setUpdate($request,$id)){
            return redirect()->route("admin.post.edit",$id)->with('status', 'Alterado com sucesso!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = $this->Post->find($id);
        $delete->delete();
        if($delete){
            return response()->json([
                'success' => 'Postagem foi deletada com sucesso',
                'id' => $id
            ]);
        }
    }
}
