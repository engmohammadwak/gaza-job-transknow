<?php

namespace App\Http\Controllers\FrontController;

use App\Category;
use App\Http\Controllers\Controller;
use App\JobSeeker;
use App\Region;
use Illuminate\Http\Request;

class JobSeekerProfileController extends Controller
{
    //

    public function index()
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();
        return view('front.jobseeker.profile.index', compact('jobSeeker'));
    }

    public function edit()
    {
        $regions = Region::all();
        $categories = Category::all();
        $jobSeeker = auth()->guard('jobSeeker')->user();
        return view('front.jobseeker.profile.edit', compact('jobSeeker', 'regions', 'categories'));
    }

    public function update(Request $request )
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();
        $attributes = $request->validate([
            'username' => 'required|string|max:50|unique:employers,username,' . $jobSeeker->id,
            'firstName' => 'required|string|max:25',
            'lastName' => 'required|string|max:25',
            'email' => 'required|email|unique:employers,email,' . $jobSeeker->id,
            'password' => 'nullable|string|confirmed|min:6',
            'avatar' => 'nullable|image',
            'region' => 'required|exists:regions,id',
            'category' => 'required|exists:categories,id',
            'phone' => 'required|string|max:20',
            'age' => 'required|max:3',
            'degree' => 'required|string|max:50',
            'bio' => 'required|string|max:350',
            'skills' => 'required|string|max:350',
            'web' => 'nullable|url|max:50',
            'linkedin' => 'nullable|url|max:50',
            'facebook' => 'nullable|url|max:50',
            'twitter' => 'nullable|url|max:50',
            'instagram' => 'nullable|url|max:50',
            'whatsapp' => 'nullable|url|max:50',
            'behance' => 'nullable|url|max:50',
            'github' => 'nullable|url|max:50',
        ]);

        if ($request->avatar) {
            $attributes['avatar'] = $request->avatar->store('jobSeeker_avatars');
            $jobSeeker->information()->update([
                'avatar' => $attributes['avatar'] ?? NULL,
            ]);
        }

        $jobSeeker->update([
            'username' => $attributes['username'],
            'firstName' => $attributes['firstName'],
            'lastName' => $attributes['lastName'],
            'email' => $attributes['email']
        ]);
        if ($request->password) {
            $jobSeeker->update([
                'password' => bcrypt($attributes['password'])
            ]);
        }
        $jobSeeker->information()->update([
            'region_id' => $attributes['region'],
            'category_id' => $attributes['category'],
            'bio' => $attributes['bio'],
            'skills' => $attributes['skills'],
            'degree' => $attributes['degree'],
            'age' => $attributes['age'],
            'phone' => $attributes['phone'],
        ]);

//dd($jobSeeker  );
        if ($jobSeeker->socials == null) {

            $jobSeeker->socials()->insert([
                'job_seeker_id' => $jobSeeker->id,
                'web' => $attributes['web'] ?? NULL,
                'linkedin' => $attributes['linkedin'] ?? NULL,
                'facebook' => $attributes['facebook'] ?? NULL,
                'twitter' => $attributes['twitter'] ?? NULL,
                'instagram' => $attributes['instagram'] ?? NULL,
                'whatsapp' => $attributes['whatsapp'] ?? NULL,
                'behance' => $attributes['behance'] ?? NULL,
                'github' => $attributes['github'] ?? NULL,
            ]);

        } else {
            $jobSeeker->socials()->update([
                'web' => $attributes['web'] ?? NULL,
                'linkedin' => $attributes['linkedin'] ?? NULL,
                'facebook' => $attributes['facebook'] ?? NULL,
                'twitter' => $attributes['twitter'] ?? NULL,
                'instagram' => $attributes['instagram'] ?? NULL,
                'whatsapp' => $attributes['whatsapp'] ?? NULL,
                'behance' => $attributes['behance'] ?? NULL,
                'github' => $attributes['github'] ?? NULL,
            ]);
        }

        return redirect()->route('jobSeeker.profile.index')->with('success', 'تم تعديل البيانات بنجاح');
    }

    public function upload_cv(Request $request)
    {
        $jobSeeker = auth()->guard('jobSeeker')->user();
        $attributes = $request->validate([
            'CVFile' => 'required|file|mimes:pdf|max:10000'
        ]);


            $attributes['CVFile'] = $request->CVFile->store('jobseeker_cv');
            $jobSeeker->information()->update([
                'CVFile' => $attributes['CVFile']
            ]);
        return back()->with('success','تم رفع ملف السيرة الذاتية بنجاح');
    }

}
