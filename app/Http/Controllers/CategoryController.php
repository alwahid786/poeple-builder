<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Category,User};
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    const VIEW = 'pages.superadmin.category';
    const TITLE =   'Category';
    const ROUTE = 'category';
    protected $title = "Category";


    public function __construct()
    {
        view()
            ->share([
                'title' => self::TITLE,
            ]);
    }

    public function index(Request $request)
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view(self::VIEW . '.index', [
            'categories'=>$categories
        ]);
    }


    public function create()
    {
        $view = self::VIEW . '.create';
        return view($view, [
            'title' => $this->title,
        ]);
    }


    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $rules = [
                'name' => 'required|string|max:255|unique:categories',
                'description' => 'nullable|max:255'
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return redirect()->back()->with('error', implode(',', $validator->errors()->all()))->withInput();
            }
            $record = Category::create($data);

            return redirect('category')->with('success', 'Category ' . $record->name . ' Added Successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function edit($id)
    {
        $record = Category::findOrFail($id);
        return view(self::VIEW . '.edit', [
            'category' => $record,
        ]);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|max:255'
            ]);

            $category = Category::findOrFail($id);
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();

            return redirect()->route('category.index')->with('success', 'Category updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function destroy(Request $request, $id)
    {
        try {
            $record = Category::findOrFail($id);
            $category_name = $record->name;

            $category_users = User::where("daily_video_types","LIKE","%".$category_name."%")->get();
            dd($category_users);
            // $record->delete();

            return redirect()->back()->with('success', 'Category Deleted Successfully.');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }



}
