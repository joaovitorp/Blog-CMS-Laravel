<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //
    /*
    * @function = Convert um array em uma string, 
    *
    */
    protected $fillable = [
        'title', 'content', 'password','thumb',"category","status","autor"
    ];
    private function stringCategory(array $category)
    {
        $category = implode(",",$category);
        return $category;
    }

    public function setPost($request)
    {
       $post =  parent::create([
        "title" => $request->get("title"),
        "content" => $request->get("content"),
        "thumb" => $this->uploadThumb($request),
        "category" => $this->stringCategory($request->get("category")),
        "status" => 1,
        "autor" => auth()->user()->name
       ]);
       return $post;
    }

    private function uploadThumb($request)
    {
        $name = uniqid(str_random(10));
        $path = $request->file('thumb')->storePubliclyAs(
            'thumbs', $name . "." . $request->file("thumb")->extension(), "public"
        );
       
        return $path;
        // $originalImage= $request->file('thumb');
        // $thumbnailImage = Image::make($originalImage);
        // $thumbnailPath = public_path().'/thumbnail/';
        // $originalPath = public_path().'/images/';
        // $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        // $thumbnailImage->resize(null, 700, function ($constraint) {
        //     $constraint->aspectRatio();
        // });
        // $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName()); 
        
    }

    public function setUpdate($request,$id)
    {
       $post = parent::find($id);
       if($request->file('thumb')){
            $update = $post->update([
                "title" => $request->get("title"),
                "content" => $request->get("content"),
                "thumb" => $this->uploadThumb($request),
                "category" => $this->stringCategory($request->get("category")),
                "status" => 1,
                "autor" => auth()->user()->name
            ]);
       }else{
            $update =  $post->update([
                "title" => $request->get("title"),
                "content" => $request->get("content"),
                "category" => $this->stringCategory($request->get("category")),
                "status" => 1,
                "autor" => auth()->user()->name
            ]);
       }
       return $update;
    }
}
