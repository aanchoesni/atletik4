<?php

class RekorsController extends \BaseController
{

    /**
     * Display a listing of rekors
     *
     * @return Response
     */
    public function index()
    {
        $rekors = Rekor::all();

        return View::make('rekors.index', compact('rekors'))->withTitle('Rekor');
    }

    /**
     * Show the form for creating a new rekor
     *
     * @return Response
     */
    public function create()
    {
        return View::make('rekors.create');
    }

    /**
     * Store a newly created rekor in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Rekor::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Rekor::create($data);

        return Redirect::route('rekors.index');
    }

    /**
     * Display the specified rekor.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $rekor = Rekor::findOrFail($id);

        return View::make('rekors.show', compact('rekor'));
    }

    /**
     * Show the form for editing the specified rekor.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $rekor = Rekor::find(Crypt::decrypt($id));

        return View::make('rekors.edit', compact('rekor'))->withTitle('Ubah rekor');
    }

    /**
     * Update the specified rekor in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $rekor = Rekor::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Rekor::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $rekor->update($data);

        return Redirect::route('admin.rekors.index')->with('successMessage', 'Rekor berhasil diubah');
    }

    /**
     * Remove the specified rekor from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Rekor::destroy($id);

        return Redirect::route('rekors.index');
    }

}
