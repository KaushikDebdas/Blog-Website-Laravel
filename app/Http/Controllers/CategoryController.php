<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    # Add Catecory
    public function AddCategory()
    {
        # code...
        return view('category.addcategory');
    }
    # Store Category
    public function StoreCategory(Request $request)
    {
        #validation code...
        $validatedData = $request->validate([
            'name' => ['required', 'unique:categories', 'max:25', 'min:2'],
            'slug' => ['required', 'unique:categories', 'max:25', 'min:2'],
        ]);
        # Insert code...
        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;

        //return response()->json($data);   // Check Data with Json

        // Insert Data
        $addcategory = DB::table('categories')->insert($data);
        if ($addcategory) {
            $notification = array(
                'message' => 'Succefully Done',
                'alert-type' => 'success'
            );
            return Redirect()->route('all_category')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something is wrong',
                'alert-type' => 'error'
            );

            return Redirect()->back()->with($notification);
        }
    }

    # All Category
    public function AllCategory()
    {
        #code...
        $category = DB::table('categories')->get();
        return view('category.allcategory', compact('category'));
        //return response()->json($category);   // Check Data with Json
    }

    # View Single Category
    public function ViewCategory($id)
    {
        #code...
        //echo "$id";
        $view = DB::table('categories')->where('id', $id)->first();
        //return response()->json($view);   // Check Data with Json
        //return view('category.viewcategory', compact('view'));    // using compact method
        return view('category.viewcategory')->with('cate', $view);    // using WITH method

    }
    # Delete Category
    public function DeleteCategory($id)
    {
        #code...
        $delete = DB::table('categories')->where('id', $id)->delete();
        if ($delete) {
            $notification = array(
                'message' => 'Succefully Delete',
                'alert-type' => 'success'
            );
            return Redirect()->route('all_category')->with($notification);
        } else {
            $notification = array(
                'message' => 'Something is wrong',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    # Edit Category
    public function EditCategory($id)
    {
        #code...
        $edit = DB::table('categories')->where('id', $id)->first();
        return view('category.editcategory', compact('edit'));    // using compact method
        //return Redirect()->back();
    }

    # Update Category
    public function UpdateCategory(Request $request, $id)
    {
        # Update code...
        $data = array();
        $data['name'] = $request->updatename;
        $data['slug'] = $request->updateslugname;

        //return response()->json($data);   // Check Data with Json

        // Update Data
        $update = DB::table('categories')->where('id', $id)->update($data);
        if ($update) {
            $notification = array(
                'message' => 'Succefully Update',
                'alert-type' => 'info'
            );
            return Redirect()->route('all_category')->with($notification);
        } else {
            $notification = array(
                'message' => 'Error',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
