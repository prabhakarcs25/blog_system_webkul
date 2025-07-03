<?php

namespace App\Controllers;

use App\Models\PostModel;
use CodeIgniter\Controller;

class PostController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url']);
    }

    public function create()
    {
        return view('posts/create');
    }

    // ✅ AJAX-compatible post creation
    public function store()
    {
        $postModel = new \App\Models\PostModel();
        $user = session()->get('user');

        $data = [
            'user_id' => $user['id'],
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content')
        ];

        if ($this->request->isAJAX()) {
            $postModel->save($data);
            return $this->response->setJSON(['status' => 'success']);
        }

        // fallback if not using AJAX
        $postModel->save($data);
        return redirect()->to('/admin/posts')->with('success', 'Post published!');
    }

    public function manage()
    {
        $postModel = new PostModel();

        // Get logged-in user
        $user = session()->get('user');
        $userId = $user['id'];

        // Fetch only posts created by this user
        $data['posts'] = $postModel
            ->where('posts.user_id', $userId)
            ->join('users', 'users.id = posts.user_id')
            ->select('posts.*, users.name as author_name')
            ->orderBy('posts.created_at', 'DESC')
            ->findAll();

        return view('posts/manage', $data);
    }

    public function edit($id)
    {
        $postModel = new PostModel();
        $data['post'] = $postModel->find($id);
        return view('posts/edit', $data);
    }

    public function update($id)
    {
        $postModel = new PostModel();
        $data = [
            'title'   => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
        ];

        $postModel->update($id, $data);
        return redirect()->to('/admin/posts');
    }

    // ✅ AJAX-compatible delete
    public function delete($id)
    {
        $postModel = new PostModel();

        if ($this->request->isAJAX()) {
            $postModel->delete($id);
            return $this->response->setJSON(['status' => 'deleted']);
        }

        // fallback if not AJAX
        $postModel->delete($id);
        return redirect()->to('/admin/posts');
    }
}
