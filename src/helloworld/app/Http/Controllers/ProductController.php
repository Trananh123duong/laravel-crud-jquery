<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('ajaxdata');
    }

    public function getproducts($id = 0)
    {

        if ($id == 0) {
            $product = Product::orderby('id', 'asc')->select('*')->get();
        } else {
            $product = Product::select('*')->where('id', $id)->get();
        }
        // Fetch all records
        $userData['data'] = $product;

        echo json_encode($userData);
        exit;
    }
}
