<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Tag;

class PostAdminController extends Controller {

    protected $post;

    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function index() {
        $posts = $this->post->paginate(5);
        return view('admin.post.index', compact('posts'));
    }

    public function create() {
        return view('admin.post.create');
    }

    public function store(PostRequest $request) {
        $tagsIds = $this->getTagsIds($request->tags);
        $post = $this->post->create($request->all());
        $post->tags()->sync($tagsIds);
        return redirect()->route('admin.index');
    }

    public function edit($id) {
        $post = $this->post->find($id);
        return view('admin.post.edit', compact('post'));
    }

    public function update($id, PostRequest $request) {
        $tagsIds = $this->getTagsIds($request->tags);
        $post = $this->post->find($id);
        $post->update($request->all());
        $post->tags()->sync($tagsIds);
        return redirect()->route('admin.index');
    }

    public function destroy($id) {
        $this->post->find($id)->destroy($id);
        return redirect()->route('admin.index');
    }

    private function getTagsIds($requestTags) {
        $tagsIds = array();
        $tags = array_filter(array_map('trim', explode(',', $requestTags)));
        foreach ($tags as $tagName) {
            $tagsIds[] = Tag::firstOrCreate(['name' => $tagName])->id;
        }
        return $tagsIds;
    }

}
