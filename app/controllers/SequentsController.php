<?php

class SequentsController extends \BaseController
{

    /**
     * Display a listing of sequents
     *
     * @return Response
     */
    public function index()
    {
        $sequents = Sequent::all();

        return View::make('sequents.index', compact('sequents'))->withTitle('Pengaturan Nomor Dada');
    }

    /**
     * Show the form for creating a new sequent
     *
     * @return Response
     */
    public function create()
    {
        return View::make('sequents.create');
    }

    /**
     * Store a newly created sequent in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Sequent::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        Sequent::create($data);

        return Redirect::route('sequents.index');
    }

    /**
     * Display the specified sequent.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $sequent = Sequent::findOrFail($id);

        return View::make('sequents.show', compact('sequent'));
    }

    /**
     * Show the form for editing the specified sequent.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $sequent = Sequent::find($id);

        return View::make('sequents.edit', compact('sequent'))->withTitle('Ubah Nomor Dada');
    }

    /**
     * Update the specified sequent in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $sequent = Sequent::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Sequent::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $sequent->update($data);

        return Redirect::route('admin.sequents.index')->with("successMessage", "Pengaturan Nomor Dada Berhasil di Update");
    }

    /**
     * Remove the specified sequent from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Sequent::destroy($id);

        return Redirect::route('sequents.index');
    }

}
