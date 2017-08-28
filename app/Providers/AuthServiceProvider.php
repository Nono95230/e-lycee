<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Post;
use App\Policies\PostPolicy;

use App\Qcm;
use App\Policies\QcmPolicy;

use App\Question;
use App\Policies\QuestionPolicy;
use App\Comment;
use App\Policies\CommentPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class  => PostPolicy::class,
        Qcm::class  => QcmPolicy::class,
        Question::class  => QuestionPolicy::class,
        Comment::class  => CommentPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
