<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kos;
use App\Image;

class KosController extends Controller
{
    public function index($limit = 10, $offset = 0)
    {
        $kos = array();
        foreach (Kos::take($limit)->skip($offset)->get() as $p) {
            $q = Image::where('id_image',$p->image_id)->first();
            $item = [
                "id"          => $p->id,
                "type"        => $p->kos_type,
                "name"            => $p->name,
                "alamat"            => $p->alamat,
                "description"            => $p->description,
                "image_id"            => $p->image_id,
                "length"            => $p->length,
                "width"            => $p->width,
                "price"            => $p->price,
                "bathroom"            => $p->bathroom,
                "wifi"            => $p->wifi,
                "ac"            => $p->ac,
                "food"            => $p->food,
                "laundry"            => $p->laundry,
                "tutoring"            => $p->tutoring,
                "kitchen"            => $p->kitchen,
                "m_parking"            => $p->m_parking,
                "price_string" => number_format($p->price),
                "url"           => $q->url
            ];
            
            array_push($kos, $item);
        };
        $data["kos"] = $kos;
        $data["status"] = 1;
        $data["count"] = Kos::count();
        return response($data);
    }

    public function detail($id)
    {
        $data = Kos::where('id', $id)->first();
        $data['price_string'] = number_format($data->price);
        $gambar = array();
        foreach(Image::where('id_kos',$data->id)->get() as $p){
            $item = [
                "url"          => $p->url,
            ];
            array_push($gambar, $item);
        };
        $data['gambar']=$gambar;
        return response($data);
    }

    public function find(Request $request, $limit = 10, $offset = 0)
    {
        $find = $request->find;
        $carikos = Kos::where("id","like","%$find%")
        ->orWhere("name","like","%$find%")
        ->orWhere("owner","like","%$find%")
        ->orWhere("description","like","%$find%")
        ->orWhere("kos_type","like","%$find%");
        ;
        $kos = array();
        foreach ($carikos->take($limit)->skip($offset)->get() as $p) {
            $q = Image::where('id_image',$p->image_id)->first();
            $item = [
                "id"          => $p->id,
                "type"        => $p->kos_type,
                "name"            => $p->name,
                "alamat"            => $p->alamat,
                "description"            => $p->description,
                "image_id"            => $p->image_id,
                "length"            => $p->length,
                "width"            => $p->width,
                "price"            => $p->price,
                "bathroom"            => $p->bathroom,
                "wifi"            => $p->wifi,
                "ac"            => $p->ac,
                "food"            => $p->food,
                "laundry"            => $p->laundry,
                "tutoring"            => $p->tutoring,
                "kitchen"            => $p->kitchen,
                "m_parking"            => $p->m_parking,
                "price_string" => number_format($p->price),
                "url"           => $q->url
            ];
            
            array_push($kos, $item);
        };
        $data["kos"] = $kos;
        $data["status"] = 1;
        $data["count"] = $carikos->count();
        return response($data);
    }
    
    
}
