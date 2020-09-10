<?php

namespace App\Jobs;

use App\ApiClient\ThirdPartyPost;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportPosts implements ShouldQueue
{

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @param  \App\ApiClient\ThirdPartyPost  $thirdPartyPost
     *
     * @return void
     * @throws \HttpResponseException
     */
    public function handle(ThirdPartyPost $thirdPartyPost)
    {
        return $thirdPartyPost->importPost();
    }
}
