<?php


namespace App\ApiClient;


use App\Post;
use App\User;
use HttpResponseException;
use Illuminate\Support\Facades\Http;

class ThirdPartyPost
{

    /**
     * @var \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
     */
    protected $endpoint;

    public function __construct()
    {
        $this->endpoint = config('apiclient.ANOTHER_BLOG.endpoint');
    }

    /**
     * @return mixed
     * @throws \HttpResponseException
     */
    public function getPosts()
    {
        $response = Http::get($this->endpoint.'/posts');
        if ($response->failed()) {
            throw new HttpResponseException('Failed to get posts',
                $response->status());
        }
        return $response->json()['data'];
    }

    /**
     * @return mixed
     * @throws \HttpResponseException
     */
    public function importPost()
    {
        $user_id = User::where('username', 'admin')->first()->id;
        $posts = $this->getPosts();
        $importedPosts = [];
        foreach ($posts as $post) {
            $post['user_id'] = $user_id;
            $post['created_at'] = $post['publication_date'];
            $post['updated_at'] = $post['publication_date'];
            unset($post['publication_date']);
            $importedPosts[] = $post;
        }
        return Post::insert($importedPosts);
    }

}
