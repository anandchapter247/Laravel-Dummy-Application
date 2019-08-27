<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use UserDetails;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = array();
        $userId = UserDetails::getUserDetails()->id;
        $data['blogs'] = Blog::where("author", $userId)->orderBy('id', 'desc')->simplePaginate(5);
        return view('home', $data);
    }
    /**
     * 
     * 
    */
    public function addBlog(Request $request)
    {
        return view("add-blog");
    }
    /**
     * 
     * 
      */
    public function submitBlog(Request $request)
    {
        $title = $request->get('title');
        $summary = $request->get('summary');
        $description = $request->get('description');
        $userId = UserDetails::getUserDetails()->id;
        Blog::insert(array(
            "title" => $title,
            "summary"=>$summary,
            "long_description" => $description,
            "author"=> $userId,
            "created_at" => date("Y-m-d H:m:s")
        ));
        
        return redirect("home")->with('success', 'Blog created successfully!');
    }
    /**
     * 
     * 
    */
    public function deleteBlog(Request $request)
    {
        $blogId = $request->get('id');
        $userId = UserDetails::getUserDetails()->id;
        $deletedRows = Blog::where(array("id" => $blogId, "author" => $userId))->delete();
        return redirect("home")->with('success', $deletedRows.' blog deleted successfully!');
    }
}
