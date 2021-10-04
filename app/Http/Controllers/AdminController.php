<?php

namespace App\Http\Controllers;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
    
    public function addproduct(Request $request)
    {
        return view('admin.addproduct');
    }

    public function add(Request $request)
    {
        //Memindahkan File Gambar Ke Assets
        $data=new Product;
        $request->file('img')->move(public_path('images/product/'), $request->file('img')->getClientOriginalName());
        
        //Masukkan Data Ke Database
        $data->image = 'images/product/' . $request->file('img')->getClientOriginalName();
        $data->name=$request->name;
        $data->price=$request->price;
        $data->category_id=$request->category_id;
        $data->desc=$request->description;
        
        //Save Data
        $data->save();
        return redirect()->back()->with('message','Produk berhasil Ditambahkan');

    }
    
    public function view()
    {
        $products=product::all();
        return view('admin.viewproduct',compact('products'));
    }

    public function deleteproduct($id)
    {
        $data=Product::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product Deleted');
    }

    public function updateview($id)
    {
        $data=Product::find($id);
        return view('admin.updateview',compact('data'));
    }

    public function updateproduct(Request $request,$id)
    {
        $data=Product::find($id);
        $image=$request->file('img');
        if($image)
        {
            $request->file('img')->move(public_path('images/product', $image));
            $data->image = 'images/product/' . $request->file('img')->getClientOriginalName();
        }
        $data->name=$request->name;
        $data->price=$request->price;
        $data->category_id=$request->category_id;
        $data->desc=$request->description;

        $data->save();
        return redirect()->back()->with('message','Produk berhasil DiUpdate');
    }

    public function viewuser()
    {
        $users=User::all();
        return view('admin.viewuser',compact('users'));
    }

    public function deleteuser($id)
    {
        $data=User::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product Deleted');
    }

    public function updateuserview($id)
    {
        $data=User::find($id);
        return view('admin.userupdateview',compact('data'));
    }

    public function updateuser(Request $request,$id)
    {
        $data=User::find($id);
        
        $data->name=$request->name;
        $data->email=$request->email;
        $data->usertype=$request->usertype;
        $data->address=$request->address;
        $data->phone=$request->phone;

        $data->save();
        return redirect()->back()->with('message','User berhasil DiUpdate');
    }
}
