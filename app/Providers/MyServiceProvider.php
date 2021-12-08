<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Http\View\Composers\UsersComposer;
use App\Http\View\Composers\SchoolsComposer;
use App\Quiz\Codes\Composers\CodesComposer;
use App\Quiz\Questions\Composers\QuestionsComposer;
use App\Quiz\Finish\Composers\ResultComposer;
use App\Quiz\Admin\CSComposer;
use App\Quiz\Admin\ResComposer;
use App\Quiz\Admin\Login\LogoutComposer;
use App\Quiz\Admin\ResultDescComposer;
use App\Quiz\Admin\AnswersComposer;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //View::Composer(['create','schools'],SchoolsComposer::class);
        //View::composer(['users'], UsersComposer::class);
        View::composer(['Codes.View.enter-code'], CodesComposer::class);
        View::composer(['Questions.View.questions'], QuestionsComposer::class);
        View::composer(['Finish.View.finish'], ResultComposer::class);
        View::composer(['Admin.View.teachers'], CSComposer::class);
        View::composer(['Admin.View.students'], ResComposer::class);
        View::composer(['Admin.View.layout','Admin.RequestLogin.View.login.html'], LogoutComposer::class);
        View::composer(['Admin.View.result'], ResultDescComposer::class);
        View::composer(['Admin.View.answers'], AnswersComposer::class);
    }
}
