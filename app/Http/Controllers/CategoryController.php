<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    
    public function index()
    {
       return view('categories.index');
    }

  
  public function getCategories()
   {
    $subdpt = Category::with('department')
                ->get();

        return Datatables::of($subdpt)
            ->addColumn('action', function ($subdpt) 
            {
                //return '<a href="#edit-'.$grades->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>Edit</a>';

                   return '<a  class="btn btn-xs btn-primary"  data-toggle="modal"  data-target=".modalUpdateCat" onclick ="launchUpdateSubDeptModal(1);"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })

            ->make(true);

   }


    public function store(Request $request)
    {
    //return $request->all();

         $this->validator($request->all())->validate();

        $new  = new Category();
        $new->departmentId     =$request->departmentId;
        $new->name             =$request->name;
        $new->save();


    $notification = array(
            'message'=>'New Sub Department  was added',
            'alert-type'=>'success'
                    );

        return back()->with($notification);
        
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        return $request->name;
    }

    
    
    public function destroy($id)
    {
        
    }
     protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'unique:categories'
        ]);

    }
    public function catDetails($id)

    {
        $cat  =Category::with('department')->find($id);
        return $cat;

    }
    public function updateCat(Request $request)
    {

        $update   =Category::find($request->catID)->update(['name'=>$request->name]);

         $notification = array(
            'message'=>'Sub Department  was updated',
            'alert-type'=>'success'
                    );

        return back()->with($notification);

    }

}
