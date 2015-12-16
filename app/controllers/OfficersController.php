<?php

class OfficersController extends \BaseController
{

    /**
     * Display a listing of officers
     *
     * @return Response
     */
    public function index()
    {
        $date         = \Carbon\Carbon::now();
        $thn          = date('Y');
        $menu         = Menu::where('tipe', Sentry::getUser()->last_name)->get();
        $announcement = Setting::first();

        // $officers = Officer::all();
        $officers = Officer::where('user_id', Sentry::getUser()->id)->where(DB::raw('YEAR(created_at)'), '=', $thn)->get();

        return View::make('officers.index', compact('officers'))
            ->withTitle('Petugas')
            ->with('menu', $menu)
            ->with('thn', $thn)
            ->with('announcement', $announcement);
    }

    public function indexthn()
    {
        $date         = \Carbon\Carbon::now();
        $thn          = Input::get('tahun');
        $menu         = Menu::where('tipe', Sentry::getUser()->last_name)->get();
        $announcement = Setting::first();

        // $officers = Officer::all();
        $officers = Officer::where('user_id', Sentry::getUser()->id)->where(DB::raw('YEAR(created_at)'), '=', $thn)->get();

        return View::make('officers.index', compact('officers'))
            ->withTitle('Petugas')
            ->with('menu', $menu)
            ->with('thn', $thn)
            ->with('announcement', $announcement);
    }

    /**
     * Show the form for creating a new officer
     *
     * @return Response
     */
    public function create()
    {
        $menu = Menu::where('tipe', Sentry::getUser()->last_name)->get();

        return View::make('officers.create')
            ->withTitle('Tambah Petugas')
            ->with('menu', $menu);
    }

    /**
     * Store a newly created officer in storage.
     *
     * @return Response
     */
    public function store()
    {
        $date = \Carbon\Carbon::now();
        $thn  = date('Y');

        $officer = Officer::where('type', Input::get('type'))->where('user_id', Sentry::getUser()->id)->where(DB::raw('YEAR(created_at)'), '=', $thn)->count();

        if ($officer < 1) {
            $validator = Validator::make($data = Input::all(), Officer::$rules);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            $data['user_id'] = Sentry::getUser()->id;
            Officer::create($data);

            return Redirect::route('user.officers.index')->with("successMessage", "Petugas berhasil disimpan");
        } else {
            return Redirect::route('user.officers.index')->with('errorMessage', trans(Input::get('type') . ' sudah ada.'));
        }
    }

    /**
     * Display the specified officer.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $officer = Officer::findOrFail($id);

        return View::make('officers.show', compact('officer'));
    }

    /**
     * Show the form for editing the specified officer.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $menu    = Menu::where('tipe', Sentry::getUser()->last_name)->get();
        $officer = Officer::find(Crypt::decrypt($id));

        return View::make('officers.edit', compact('officer'))
            ->withTitle('Ubah')
            ->with('menu', $menu);
    }

    /**
     * Update the specified officer in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $date = \Carbon\Carbon::now();
        $thn  = date('Y');
        $menu = Menu::where('tipe', Sentry::getUser()->last_name)->get();

        $officer = Officer::where('type', Input::get('type'))->where('user_id', Sentry::getUser()->id)->where(DB::raw('YEAR(created_at)'), '=', $thn)->count();

        if ($officer < 1) {
            $officer = Officer::findOrFail($id);

            $validator = Validator::make($data = Input::all(), Officer::$rules);

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator)->withInput();
            }

            $officer->update($data);

            return Redirect::route('user.officers.index')->with("successMessage", "Data petugas berhasil diubah");
        } else {
            return Redirect::route('user.officers.index')->with('errorMessage', trans(Input::get('type') . ' sudah ada.'));
        }
    }

    /**
     * Remove the specified officer from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Officer::destroy($id);

        return Redirect::route('user.officers.index')->with("successMessage", "Data petugas berhasil dihapus");
    }

}
