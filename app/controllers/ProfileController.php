<?php

class ProfileController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $menu    = Menu::where('tipe', Sentry::getUser()->last_name)->get();
        $school  = School::where('user_id', Sentry::getUser()->id)->first();
        $profile = School::find($school->id);

        return View::make('profile.index', compact('profile'))
            ->withTitle('Profile')
            ->with('menu', $menu);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $menu   = Menu::where('tipe', Sentry::getUser()->last_name)->get();
        $school = School::findOrFail($id);

        $validator = Validator::make($data = Input::all(), School::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $school->update($data);

        return Redirect::route('user.profile.index')
            ->with("successMessage", "Data Sekolah Berhasil di Update")
            ->withTitle('Profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
