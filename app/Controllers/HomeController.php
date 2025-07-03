<?php

namespace App\Controllers;

use App\Models\PostModel;
use App\Models\UserModel;

class HomeController extends BaseController
{
    public function __construct()
    {
        helper(['url', 'text']); //  Needed for site_url(), word_limiter()
    }


    
    public function index()
    {

        if (!session()->get('user')) {
            return redirect()->to('/login')->with('error', 'Please log in to access the blog.');
        }
        $postModel = new PostModel();
        $data['posts'] = $postModel->orderBy('created_at', 'DESC')
                                   ->join('users', 'users.id = posts.user_id')
                                   ->select('posts.*, users.name as author_name')
                                   ->findAll();
        return view('frontend/home', $data);
    }

    public function post($id)
    {
        $postModel = new PostModel();
        $data['post'] = $postModel->join('users', 'users.id = posts.user_id')
                                  ->select('posts.*, users.name as author_name')
                                  ->find($id);
        return view('frontend/post', $data);
    }

    public function author($user_id)
    {
        $postModel = new PostModel();
        $data['posts'] = $postModel->where('user_id', $user_id)
                                   ->join('users', 'users.id = posts.user_id')
                                   ->select('posts.*, users.name as author_name')
                                   ->findAll();
        return view('frontend/author', $data);
    }
}
