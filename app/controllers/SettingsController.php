<?php

class SettingsController extends \BaseController
{

    /**
     * Display a listing of settings
     *
     * @return Response
     */
    public function index()
    {
        // $settings = Setting::all();
        $settings = Setting::find('1');

        return View::make('settings.index', compact('settings'))->withTitle('Settings');
    }

    /**
     * Show the form for creating a new setting
     *
     * @return Response
     */
    public function create()
    {
        return View::make('settings.create');
    }

    /**
     * Store a newly created setting in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Setting::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Setting::create($data);

        return Redirect::route('settings.index');
    }

    /**
     * Display the specified setting.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $setting = Setting::findOrFail($id);

        return View::make('settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified setting.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);

        return View::make('settings.edit', compact('setting'));
    }

    /**
     * Update the specified setting in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $setting = Setting::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Setting::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $setting->update($data);

        return Redirect::route('admin.settings.index')->withTitle('Settings')->with("successMessage", "Pengaturan Berhasil diubah");
    }

    /**
     * Remove the specified setting from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Setting::destroy($id);

        return Redirect::route('settings.index');
    }

}
