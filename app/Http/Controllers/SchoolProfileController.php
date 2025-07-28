<?php

namespace App\Http\Controllers;

use App\Models\SchoolProfile;

class SchoolProfileController extends Controller
{
    /**
     * Display the school profile page.
     *
     * @param  string  $key
     * @return \Illuminate\Http\Response
     */
    public function show($key)
    {
        // Make sure we're getting fresh data from the database
        $profile = SchoolProfile::where('key', $key)->firstOrFail();

        // Force reload of data from database
        $profile->refresh();

        return view('school-profile.show', compact('profile'));
    }

    /**
     * Display the school vision and mission.
     *
     * @return \Illuminate\Http\Response
     */
    public function visionMission()
    {
        // Force fresh data by using find() or query builder instead of cached values
        $vision = SchoolProfile::where('key', 'visi')->first();
        $mission = SchoolProfile::where('key', 'misi')->first();

        return view('school-profile.vision-mission', compact('vision', 'mission'));
    }

    /**
     * Display the school history.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        // Force fresh data by using query builder
        $history = SchoolProfile::where('key', 'sejarah')->first();

        return view('school-profile.history', compact('history'));
    }

    /**
     * Display the educational goals.
     *
     * @return \Illuminate\Http\Response
     */
    public function educationalGoals()
    {
        // Force fresh data by using query builder
        $goals = SchoolProfile::where('key', 'tujuan')->first();

        return view('school-profile.goals', compact('goals'));
    }
}
