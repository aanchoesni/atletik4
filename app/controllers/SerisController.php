<?php

class SerisController extends \BaseController
{

    /**
     * Display a listing of seris
     *
     * @return Response
     */
    public function index()
    {
        $seris = Seri::all();

        return View::make('seris.index', compact('seris'));
    }

    /**
     * Show the form for creating a new seri
     *
     * @return Response
     */
    public function create()
    {
        return View::make('seris.create')->withTitle('Tambah Seri');
    }

    /**
     * Store a newly created seri in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Seri::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Seri::create($data);

        return Redirect::route('admin.settings.index')->with('successMessage', 'Seri berhasil ditambahkan');
    }

    /**
     * Display the specified seri.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $seri = Seri::findOrFail($id);

        return View::make('seris.show', compact('seri'));
    }

    /**
     * Show the form for editing the specified seri.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $seri = Seri::find($id);

        return View::make('seris.edit', compact('seri'));
    }

    /**
     * Update the specified seri in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $seri = Seri::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Seri::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $seri->update($data);

        return Redirect::route('seris.index');
    }

    /**
     * Remove the specified seri from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Seri::destroy($id);

        return Redirect::route('admin.settings.index')->with('successMessage', 'Seri berhasil dihapus');
    }

}
