<?php
//
namespace App\Http\Controllers;
use App\Post; //namespace of Post class

use Illuminate\Http\Request;
use Illuminate\Session\Store;

class postController extends Controller
{
    //actions
    //link them up in the routes file, and therefore connect our routes to certain methods in this controller,which should get executed.
    public function getIndex(Store $session){
        $post = new Post();
        $posts = $post->getPosts($session);
        return view('blog.index',['posts' => $posts]); //passing data to blog.index view and return the view
    }

    public function getAdminIndex(Store $session)
    {
        $post = new Post();
        $posts = $post->getPosts($session);
        return view('admin.index', ['posts' => $posts]);
    }

    public function getPost(Store $session, $id)
    {
        $post = new Post();
        $post = $post->getPost($session, $id);
        return view('blog.post', ['post' => $post]);
    }

    public function getAdminCreate()
    {
        return view('admin.create');
    }

    public function getAdminEdit(Store $session, $id)
    {
        $post = new Post();
        $post = $post->getPost($session, $id);
        return view('admin.edit', ['post' => $post, 'postId' => $id]);
    }

    public function postAdminCreate(Store $session, Request $request)
    {
        $this->validate($request, [                           //does the same thing as in the route file, $validation = $validator->make($request->all(),[
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $post = new Post();
        $post->addPost($session, $request->input('title'), $request->input('content'));
        return redirect()->route('admin.index')->with('info', 'Post created, Title is: ' . $request->input('title'));
    }

    public function postAdminUpdate(Store $session, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $post = new Post();
        $post->editPost($session, $request->input('id'), $request->input('title'), $request->input('content'));
        return redirect()->route('admin.index')->with('info', 'Post edited, new Title is: ' . $request->input('title'));
    }

}
