<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(){
        // Select * from posts;
        $postsFromDB = Post::all(); //collection object
        //dd($postsFromDB);
        //$allPosts = [
        //    ['id' => 1, 'title' =>'PHP', 'posted_by' => 'Ahmed', 'createdAt'=> '20-12-2023'],
        //    ['id' => 2, 'title' =>'PHP', 'posted_by' => 'Ahmed', 'createdAt'=> '20-12-2023'],
        //    ['id' => 3, 'title' =>'PHP', 'posted_by' => 'Ahmed', 'createdAt'=> '20-12-2023'],
        //    ['id' => 4, 'title' =>'PHP', 'posted_by' => 'Ahmed', 'createdAt'=> '20-12-2023'],
        //];
        return view('index', ['posts' => $postsFromDB]);
    }

    public function show($postId){
        // Select * from posts where id = $postId;
        //dd($postId);
        $singlePostFromDB = Post::findOrFail($postId); //model object
        //$singlePost = ['id' => 1, 'title' =>'PHP', 'description' => 'hellopppp', 'posted_by' => 'Ahmed', 'created_at'=> '20-12-2023'];
        return view('show', ['post' => $singlePostFromDB]);
    }

    public function create(){
        //Select * from users
        $usersfromDB = User::all();
        return view('create', ['users'=>$usersfromDB]);;
    }

    public function store(){
        //$data = request()->all();
        //return $data;
        //get user data
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->postCreator;

        //Store data in database
        $post = new Post;
        $post -> title = $title;
        $post -> description = $description;
        $post -> user_id = $postCreator;
        $post -> save();

        //Or another method but we have to make changes in Post.php 
        // so that title and description is fillable
        //Post::create([
        //    'title'=>$title,
        //    'description'=>$description
        //]);

        //return to posts.inndex
        return to_route('posts.index');
    }

    public function edit($postId){
        //get all users
        $usersfromDB = User::all();
        $singlePostFromDB = Post::findOrFail($postId);

        //return 'We are in edit';
        return view('edit',['users'=>$usersfromDB],['post' => $singlePostFromDB]);
    }

    public function update($postId){
        // dd($postId);
        //$data = request()->all();
        $title = request()->title;
        $description = request()->description;
        $postCreator = request()->postCreator;

        //select or find post from database
        $singlePostFromDB = Post::find($postId);

        //update
        $singlePostFromDB->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $postCreator,
        ]);
        
        return to_route('posts.show', $postId);
    }

    public function destroy($postId){
        $singlePostFromDB = Post::findOrFail($postId);
        $singlePostFromDB->delete();
        return to_route('posts.index');
    }
}
