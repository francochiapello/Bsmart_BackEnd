<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','price','stock','category_id'];

    static public function findBy(){
        $request = self::select('products.*');

        if (!empty(Request::get('name'))) {
            $request = $request->where('name', '=', Request::get('name'));
        }
        if (!empty(Request::get('description'))) {
            $request = $request->where('description', '=', Request::get('description'));
        }
        if (!empty(Request::get('price'))) {
            $request = $request->where('price', '=', Request::get('price'));
        }
        if (!empty(Request::get('stock'))) {
            $request = $request->where('stock', '=', Request::get('stock'));
        }
        if (!empty(Request::get('category_id'))) {
            $request = $request->where('category_id', '=', Request::get('category_id'));
        }

        $request = $request->orderBy('id','desc')->paginate(20);

        return $request;
    }
}
