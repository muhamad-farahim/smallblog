<?php

namespace App\Http\Controllers;

use illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

use PDO;

class BlogController extends Controller
{

    // READ METHODS

    function view_global(Request $re)
    {
        $blogs = Blog::all();
        $blogs = $blogs->reverse();
        $context = compact('blogs');
        return view('blog.viewglobal', $context);
    }

    function my_blogs(Request $request)
    {

        $user = $request->user();

        if (!$user) {

            abort(404);
        }

        $blogs = $user->blogs()->get();

        $blogs = count($blogs) === 0 ? "empty" : $blogs->reverse();

        return view('blog.myblogs', compact("blogs"));
    }

    function user_blogs(string $username)
    {
        dd('lol');

        $user = User::where("username", $username)->first();

        if (!$user) {

            abort(404);
        }

        $blogs = $user->blogs()->get();

        $blogs = count($blogs) === 0 ? "empty" : $blogs->reverse();

        return view('blog.userblogs', compact("blogs"));
    }

    function specific_blog(string $username, int $blogid)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {

            abort(404);
        }


        $blog = $user->specific_blog($blogid);

        if (!$blog) {

            abort(404);
        }

        return view('blog.specific', compact('user', 'blog'));
    }




    function add_blog(Request $re)
    {

        if ($re->method() === "POST") {

            $validated_data = $re->validate([
                "title" => "required|max:70",
                "desc" => "required|max:255",
                "body" => "required",
                "img" => "required|image|mimes:jpg,jpeg",
            ]);

            // dd($validated_data);

            $validated_data['img'] = $re->file('img')->store('test');
            $validated_data['user_id'] = $re->user()->id;

            // dd($validated_data);

            Blog::create($validated_data);

            return redirect(route('add_blog'))->with("status", "Blog created successfully");
        } elseif ($re->method() === "GET") return view('blog.addblog');

        return abort(405);
    }

    function delete_blog(Request $re){

        $blg = Blog::where(['id' => $re->input('id')])->first();

        $blg->delete();

        return redirect(route('my_blogs'))->with("deletesuc", "Blog deleted successfully");
    }

    function update_blog(Request $re, $id){
        $blog = Blog::findOrFail($id);

        if($re->method() === 'POST'){
            $validated_data = $re->validate([
                "title" => "required|max:70",
                "desc" => "required|max:255",
                "body" => "required",
                "img" => "image|mimes:jpg,jpeg"
            ]);

            if(isset($validated_data['img']) && isset($blog->img)){
                
                $str = str_replace('/', '\\', $blog->img);
                
                // dd($str);
                unlink(storage_path('app\public\\'. $str));
                $validated_data['img'] = $re->file('img')->store('test');
            }

            $blog->update($validated_data);

            return redirect(route('my_blogs'));
        }
        elseif($re->method() === "GET"){

            return view('blog.updateblog', compact('blog'));
        }

        return abort(404);
    }
}