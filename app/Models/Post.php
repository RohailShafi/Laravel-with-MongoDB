<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use MongoDB\BSON\ObjectId;
use MongoDB\Laravel\Eloquent\Model;

class Post extends Model
{
    use HasApiTokens;

    protected $connection = 'mongodb';

    public function __construct(array $attributes = [])
    {
        $this->table = config('database.models.' . class_basename(__CLASS__) . '.table');
        $this->fillable = config('database.models.' . class_basename(__CLASS__) . '.fillable');
        $this->hidden = config('database.models.' . class_basename(__CLASS__) . '.hidden');

        parent::__construct($attributes);
    }

    //queries
    public static function createPost($request){

        $data = $request->only((new self())->getFillable());

        return self::create($data);
    }

    public static function updatePost($request){

        $data = $request->only((new self())->getFillable());

        $id = $request->input('id');

        $post = self::where('_id', new ObjectId($id))->first();

        return tap($post)->update($data);
    }

    public static function post($request){

        return self::find($request->input('id'));
    }

    public static function posts(){

        return self::all();
    }

    public static function deletePost($request){

        $id = $request->input('id');

        $post = self::where('_id' , new ObjectId($id))->first();

        $post->delete();

    }
}
