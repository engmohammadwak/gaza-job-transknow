<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'jobSeeker'], function () {
    Config::set('auth.defines', 'jobSeeker');

    Route::get('/login', 'Auth\JobSeekerLoginController@login_form')->name('jobSeeker.login_form');
    Route::post('/submit-login', 'Auth\JobSeekerLoginController@login')->name('jobSeeker.login');
    Route::get('/register', 'Auth\JobSeekerLoginController@register_form')->name('jobSeeker.register_form');
    Route::post('/submit_register', 'Auth\JobSeekerLoginController@register_post')->name('jobSeeker.register');
    Route::get('logout', 'Auth\JobSeekerLoginController@logout_jobSeeker')->name('jobSeeker.logout');

    Route::group(['middleware' => ['jobSeekerAuth:jobSeeker']], function () {
        Route::group(['prefix' => 'my-application', 'namespace' => 'FrontController'], function () {
            //job application
            Route::get('/jobs', 'JobApplicationController@index')->name('jobSeeker.application.job.index');
            Route::get('/jobs/destroy/{id}', 'JobApplicationController@destroy')->name('jobSeeker.application.job.destroy');

            //train application
            Route::get('/trainings', 'TrainingApplicationController@index')->name('jobSeeker.application.training.index');
            Route::get('/trainings/destroy/{id}', 'TrainingApplicationController@destroy')->name('jobSeeker.application.training.destroy');

        });

        //profile
        Route::group(['prefix' => 'profile', 'namespace' => 'FrontController'], function () {
            Route::get('/', 'JobSeekerProfileController@index')->name('jobSeeker.profile.index');
            Route::get('/edit', 'JobSeekerProfileController@edit')->name('jobSeeker.profile.edit');
            Route::post('/update/', 'JobSeekerProfileController@update')->name('jobSeeker.profile.update');

            //upload CV
            Route::post('/upload_cv', 'JobSeekerProfileController@upload_cv')->name('jobSeeker.profile.upload_cv');

            //jobSeeker education stuff
            Route::group(['prefix' => 'education'], function () {
                Route::get('/create', 'JobSeekerEductaionController@create')->name('jobSeeker.profile.education.create');
                Route::post('/store', 'JobSeekerEductaionController@store')->name('jobSeeker.profile.education.store');
                Route::get('/edit/{id}', 'JobSeekerEductaionController@edit')->name('jobSeeker.profile.education.edit');
                Route::post('/update/{id}', 'JobSeekerEductaionController@update')->name('jobSeeker.profile.education.update');
                Route::get('/destroy/{id}', 'JobSeekerEductaionController@destroy')->name('jobSeeker.profile.education.destroy');
            });

            //jobSeeker experience stuff
            Route::group(['prefix' => 'experience'], function () {
                Route::get('/create', 'JobSeekerExperienceController@create')->name('jobSeeker.profile.experience.create');
                Route::post('/store', 'JobSeekerExperienceController@store')->name('jobSeeker.profile.experience.store');
                Route::get('/edit/{id}', 'JobSeekerExperienceController@edit')->name('jobSeeker.profile.experience.edit');
                Route::post('/update/{id}', 'JobSeekerExperienceController@update')->name('jobSeeker.profile.experience.update');
                Route::get('/destroy/{id}', 'JobSeekerExperienceController@destroy')->name('jobSeeker.profile.experience.destroy');
            });

            //jobSeeker training stuff
            Route::group(['prefix' => 'training'], function () {
                Route::get('/create', 'JobSeekerTrainingController@create')->name('jobSeeker.profile.training.create');
                Route::post('/store', 'JobSeekerTrainingController@store')->name('jobSeeker.profile.training.store');
                Route::get('/edit/{id}', 'JobSeekerTrainingController@edit')->name('jobSeeker.profile.training.edit');
                Route::post('/update/{id}', 'JobSeekerTrainingController@update')->name('jobSeeker.profile.training.update');
                Route::get('/destroy/{id}', 'JobSeekerTrainingController@destroy')->name('jobSeeker.profile.training.destroy');
            });

            //jobSeeker Verify
            Route::group(['prefix' => 'verify'], function () {
                Route::get('/create', 'JobSeekerProfileController@formVerify')->name('jobSeeker.verify.create');
                Route::post('/store/{jobSeeker}', 'JobSeekerProfileController@storeVerify')->name('jobSeeker.verify.store');
            });

            //inquire application
            Route::group(['prefix' => 'inquire'], function () {
//            Route::get('/training/{training}','TrainingInquireController@show')->name('jobSeeker.inquire.training.show');
//            Route::get('/job/{job}','JobInquireController@show')->name('jobSeeker.inquire.job.show');
                Route::get('/training', 'TrainingInquireController@index')->name('jobSeeker.inquire.training.index');
                Route::get('/job', 'JobInquireController@index')->name('jobSeeker.inquire.job.index');

            });
        });

        //teams
        Route::group(['prefix' => 'teams', 'namespace' => 'FrontController'], function () {
            Route::get('/', 'TeamController@index')->name('teams.index');
            Route::get('/create', 'TeamController@create')->name('teams.create');
            Route::post('/store', 'TeamController@store')->name('teams.store');
            Route::get('/edit/{team}', 'TeamController@edit')->name('teams.edit');
            Route::post('/update/{team}', 'TeamController@update')->name('teams.update');
            Route::get('/destroy/{team}', 'TeamController@destroy')->name('teams.destroy');

            // add member
            Route::get('/add-member/create', 'TeamMemberController@create')->name('teams.member.create');
            Route::post('/add-member/store', 'TeamMemberController@store')->name('teams.member.store');
            Route::get('/add-member/destroy/{username}', 'TeamMemberController@destroy')->name('teams.member.destroy');
        });
    });

});

//employer
Route::group(['prefix' => 'employer'], function () {

    Config::set('auth.defines', 'employer');
    //  employer auth
    Route::get('/login', 'Auth\EmployerLoginController@login_form')->name('employer.login_form');
    Route::post('/submit-login', 'Auth\EmployerLoginController@login')->name('employer.login');
    Route::get('/register', 'Auth\EmployerLoginController@register_form')->name('employer.register_form');
    Route::post('/submit_register', 'Auth\EmployerLoginController@register_post')->name('employer.register');
    Route::get('/logout', 'Auth\EmployerLoginController@logout_employer')->name('employer.logout');

    Route::group(['middleware' => ['employerAuth:employer']], function () {
        //employer job
        Route::group(['prefix' => 'jobs', 'namespace' => 'FrontController'], function () {

            Route::get('/', 'JobController@index')->name('job.index');
            Route::get('/create', 'JobController@create')->name('job.create');
            Route::post('/store/{employer}', 'JobController@store')->name('job.store');
            Route::get('/edit/{job}', 'JobController@edit')->name('job.edit');
            Route::post('/update/{job}', 'JobController@update')->name('job.update');
            Route::get('/destroy/{job}', 'JobController@destroy')->name('job.destroy');

            //attempt people
            Route::get('/attempts/{job}', 'JobController@attempts')->name('job.attempts');

            //inquire job
            Route::get('inquires/{job}', 'JobInquireController@inquire_to_this_job')->name('job.inquire_to_this_job');
            Route::get('inquires/{inquire}/reply', 'JobInquireController@reply_to_this_inquire')->name('job.reply_to_this_inquire');
            Route::post('inquires/{inquire}/submit-reply', 'JobInquireController@submit_reply_to_this_inquire')->name('job.submit_reply_to_this_inquire');
        });

        //employer training
        Route::group(['prefix' => 'training', 'namespace' => 'FrontController'], function () {
            Route::get('/', 'TrainingController@index')->name('training.index');
            Route::get('/create', 'TrainingController@create')->name('training.create');
            Route::post('/store/{employer}', 'TrainingController@store')->name('training.store');
            Route::get('/edit/{training}', 'TrainingController@edit')->name('training.edit');
            Route::post('/update/{training}', 'TrainingController@update')->name('training.update');
            Route::get('/destroy/{training}', 'TrainingController@destroy')->name('training.destroy');

            //attempt people
            Route::get('/attempts/{training}', 'TrainingController@attempts')->name('training.attempts');

            //inquire job
            Route::get('inquires/{training}', 'TrainingInquireController@inquire_to_this_training')->name('training.inquire_to_this_training');
            Route::get('inquires/{inquire}/reply', 'TrainingInquireController@reply_to_this_inquire')->name('training.reply_to_this_inquire');
            Route::post('inquires/{inquire}/submit-reply', 'TrainingInquireController@submit_reply_to_this_inquire')->name('training.submit_reply_to_this_inquire');

        });

        //employer profile
        Route::group(['prefix' => 'profile', 'namespace' => 'FrontController'], function () {
            Route::get('/', 'EmployerProfileController@index')->name('employer.profile.index');
            Route::get('/edit', 'EmployerProfileController@edit')->name('employer.profile.edit');
            Route::post('/update/{employer}', 'EmployerProfileController@update')->name('employer.profile.update');
        });

        //employer Verify
        Route::group(['prefix' => 'verify', 'namespace' => 'FrontController'], function () {
            Route::get('/create', 'EmployerProfileController@formVerify')->name('employer.verify.create');
            Route::post('/store/{employer}', 'EmployerProfileController@storeVerify')->name('employer.verify.store');
        });
    });
});

//home and other stuff
Route::group(['namespace' => 'FrontController'], function () {

    Route::get('/', 'HomeController@jobs')->name('jobs');
    Route::get('/employers', 'HomeController@employers')->name('employers');
    Route::get('/trainings', 'HomeController@trains')->name('trains');
    Route::get('/jobSeekers', 'HomeController@jobSeekers')->name('jobSeekers');
    Route::get('/contact-us', 'HomeController@contactForm')->name('contact-us');
    Route::post('/contact-us', 'HomeController@contactSend')->name('contact-send');


    Route::get('/job-seeker/{jobSeeker:username}', 'JobSeekerController@show')->name('jobseeker.show');
    Route::get('/employer/{employer:username}', 'EmployerController@show')->name('employer.show');
    Route::get('/job/{job:title}', 'JobController@show')->name('job.show');
    Route::get('/training/{training:title}', 'TrainingController@show')->name('training.show');


    //attempt to train
    Route::post('/training/{training}', 'TrainingApplicationController@store')->name('training.apply');

    //attempt to job
    Route::post('/job/{job}/apply', 'JobApplicationController@store')->name('job.apply');


    //inquire Job
    Route::post('/job/inquire/store/{job}', 'JobInquireController@store')->name('job.inquire.store');

    //inquire training
    Route::post('/training/inquire/store/{training}', 'TrainingInquireController@store')->name('training.inquire.store');


});


