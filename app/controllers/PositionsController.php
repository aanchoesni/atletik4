<?php

class PositionsController extends \BaseController
{

    /**
     * Display a listing of positions
     *
     * @return Response
     */
    public function index()
    {
        // $positions = DB::table('positions')->get();
        // $positions =
        // [
        //     'positions' => $positions
        // ];
        // return View::make('positions.index', $positions)->withTitle('Jabatan');
        $positions = Position::all();

        return View::make('positions.index', compact('positions'))->withTitle('Jabatan');
    }

    /**
     * Show the form for creating a new position
     *
     * @return Response
     */
    public function create()
    {
        return View::make('positions.create')->withTitle('Tambah Jabatan');
    }

    /**
     * Store a newly created position in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Position::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $position = Position::create($data);

        return Redirect::route('admin.positions.index')->with("successMessage", "Berhasil menyimpan $position->nama ");
    }

    /**
     * Display the specified position.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $position = Position::findOrFail($id);

        return View::make('positions.show', compact('position'));
    }

    /**
     * Show the form for editing the specified position.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $position = Position::find(Crypt::decrypt($id));

        return View::make('positions.edit', ['position' => $position])->withTitle("Ubah $position->name");
    }

    /**
     * Update the specified position in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $position = Position::findOrFail($id);

        $validator = Validator::make($data = Input::all(), $position->updateRules());

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $position->update($data);

        return Redirect::route('admin.positions.index')->with("successMessage", "Berhasil menyimpan $position->name ");
    }

    /**
     * Remove the specified position from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Position::destroy($id);

        return Redirect::route('admin.positions.index')->withTitle('successMessage', 'Jabatan berhasil dihapus.');
    }

}
