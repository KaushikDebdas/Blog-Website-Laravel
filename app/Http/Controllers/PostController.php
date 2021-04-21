<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //code
    public function WritePost()
    {
        # code...
        $category = DB::table('categories')->get();
        return view('post.writepost', compact('category'));
    }
    # Store Post
    public function StorePost(Request $request)
    {
        #validation code...
        $validatedData = $request->validate([
            'title' => ['required', 'max:200'],
            'details' => ['required',],
            'image' => ['mimes:jpeg,jpg,png,PNG | max:1000',]    // net theke nibo ei line
        ]);

        # Insert code...
        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image = $request->file('image');
        if ($image) {
            //$image_name = Str::random(5);   // random 5 charcter e ekta string dibe
            $image_name = hexdec(uniqid());   // unique Hexadecimal id dibe
            $extention = strtolower($image->getClientOriginalExtension());  // extention ta k choto korlam
            $image_full_name = $image_name . '.' . $extention;    // random name+extention diye full name create korlam
            $upload_path = 'public/frontend/post-image/';                       // path ta k ekta variable a rakhlam
            $image_url = $upload_path . $image_full_name;             // image_url tai DB store korbe
            $success = $image->move($upload_path, $image_full_name);   // upload path a move kore dilam & full name ta store kore nilam
            $data['image'] = $image_url;
            DB::table('posts')->insert($data);
            $notification = array(
                'message' => 'Succefully Done',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            DB::table('posts')->insert($data);
            $notification = array(
                'message' => 'Something is wrong',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    # All Post
    public function AllPost()
    {
        #code...
        //$post = DB::table('posts')->get();    // All data nibo
        // Joining
        $post = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.name')
            ->get();
        return view('post.allpost', compact('post'));
        //return response()->json($post);   // Check Data with Json
    }

    # View Single Post
    public function ViewPost($id)
    {
        #code...
        $post = DB::table('posts')
            ->join('categories', 'posts.category_id', 'categories.id')
            ->select('posts.*', 'categories.name')
            ->where('posts.id', $id)
            ->first();
        return view('post.viewpost', compact('post'));
        //return response()->json($view);   // Check Data with Json
    }

    # Edit Post
    public function EditPost($id)
    {
        #code...
        $category = DB::table('categories')->get();
        $edit = DB::table('posts')->where('id', $id)->first();
        return view('post.editpost', compact('category', 'edit'));    // using compact method
        //return response()->json($edit);   // Check Data with Json
        //return Redirect()->back();
    }

    # Update Post with Image VERY IMPORTANT & TRICKY
    public function UpdatePost(Request $request, $id)
    {
        #validation code...
        $validatedData = $request->validate([
            'title' => ['required', 'max:200'],
            'details' => ['required',],
            'image' => ['mimes:jpeg,jpg,png,PNG | max:1000',]    // net theke nibo ei line
        ]);

        # Update code with IMAGE...
        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image = $request->file('image');
        if ($image) {
            //$image_name = Str::random(5);   // random 5 charcter e ekta string dibe
            $image_name = hexdec(uniqid());   // unique Hexadecimal id dibe
            $extention = strtolower($image->getClientOriginalExtension());  // extention ta k choto korlam
            $image_full_name = $image_name . '.' . $extention;    // random name+extention diye full name create korlam
            $upload_path = 'public/frontend/post-image/';                       // path ta k ekta variable a rakhlam
            $image_url = $upload_path . $image_full_name;             // image_url tai DB store korbe
            $success = $image->move($upload_path, $image_full_name);   // upload path a move kore dilam & full name ta store kore nilam
            $data['image'] = $image_url;
            unlink($request->old_image);
            // Id soho Data Update Hobe
            DB::table('posts')->where('id', $id)->update($data);    // id pass kore dibo
            $notification = array(
                'message' => 'Succefully Update',
                'alert-type' => 'info'
            );
            return Redirect()->route('all_post')->with($notification);
        } else {
            $data['image'] = $request->old_image;
            DB::table('posts')->where('id', $id)->update($data);    // id pass kore dibo
            $notification = array(
                'message' => 'Successfully Update',
                'alert-type' => 'success'
            );
            return Redirect()->route('all_post')->with($notification);
        }
    }
    # Delete Post with Image
    public function DeletePost($id)
    {
        #code...
        $post = DB::table('posts')->where('id', $id)->first(); // prothome id ta niye ashlam
        $image = $post->image;                                        // then post er image ta k catch korlam
        $delete = DB::table('posts')->where('id', $id)->delete();  // then image & post ta k delete korlam
        if ($delete) {
            unlink($image);
            $notification = array(
                'message' => 'Succefully Delete',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Something is wrong',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
