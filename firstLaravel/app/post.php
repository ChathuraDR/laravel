<?php

namespace App;  //easily use this model throughout our app and get it loaded automatically.
/**
 * Created by PhpStorm.
 * User: ChathuraDR
 * Date: 9/11/2017
 * Time: 2:43 AM
 *
 * Post model
 */

class Post{
    //getting multiple posts for index page
    public function getPosts($session){
        if (!$session->has('posts')){
            $this->createDummyData($session);
        }
        return $session->get('posts');
    }
    //getting a single post when a user clicks on read more link
    public function getPost($session, $id)
    {
        if (!$session->has('posts')) {
            $this->createDummyData();
        }
        return $session->get('posts')[$id];
    }

    public function addPost($session, $title, $content)
    {
        if (!$session->has('posts')) {
            $this->createDummyData();
        }
        $posts = $session->get('posts');
        array_push($posts, ['title' => $title, 'content' => $content]);
        $session->put('posts', $posts);
    }

    public function editPost($session, $id, $title, $content)
    {
        $posts = $session->get('posts');
        $posts[$id] = ['title' => $title, 'content' => $content];
        $session->put('posts', $posts);
    }


    private function createDummyData($session=null){
        $posts = [
            [
                'title' => 'Learning Laravel',
                'content' => 'This blog post is the first one'
            ],[
                'title' => 'Learning Laravel 2',
                'content' => 'This blog post is the second one'
            ]
        ];
        $session->put('posts',$posts);

    }
}