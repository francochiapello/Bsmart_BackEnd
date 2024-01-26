<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];

    static public function getList(?string $fill){
        $return = self::select('categories.*');

        if (!empty($fill)) {
            $return = $return->where('name','like','%'.$fill.'%');
        }

        $return = $return->orderBy('id','desc')->paginate(20);

        return $return;
    }

    static public function findBy(){
        $request = self::select('categories.*');

        if (!empty(Request::get('name'))) {
            $request = $request->where('name', '=', Request::get('name'));
        }
        if (!empty(Request::get('description'))) {
            $request = $request->where('description', '=', Request::get('description'));
        }
        $request = $request->orderBy('id','desc')->paginate();

        return $request;
    }
}
