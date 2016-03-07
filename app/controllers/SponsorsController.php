<?php

class SponsorsController extends \BaseController
{

    /**
     * Display a listing of sponsors
     *
     * @return Response
     */
    public function index()
    {
        $sponsors = Sponsor::all();

        return View::make('sponsors.index', compact('sponsors'))->withTitle('Sponsor');
    }

    /**
     * Show the form for creating a new sponsor
     *
     * @return Response
     */
    public function create()
    {
        return View::make('sponsors.create')->withTitle('Tambah Sponsor');
    }

    /**
     * Store a newly created sponsor in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Sponsor::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $uploaded_file = Input::file('logo');
        // mengambil extension file
        $extension = $uploaded_file->getClientOriginalExtension();
        // membuat nama file random dengan extension
        $filename        = Input::get('name') . '.' . $extension;
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/sponsor';
        // memindahkan file ke folder public/img
        $uploaded_file->move($destinationPath, $filename); // 25

        $data['logo'] = $filename;
        Sponsor::create($data);

        return Redirect::route('admin.sponsors.index')->withTitle('Sponsor')->with("successMessage", "Sponsor Berhasil ditambahkan");
    }

    /**
     * Display the specified sponsor.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $sponsor = Sponsor::findOrFail($id);

        return View::make('sponsors.show', compact('sponsor'));
    }

    /**
     * Show the form for editing the specified sponsor.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $sponsor = Sponsor::find(Crypt::decrypt($id));

        return View::make('sponsors.edit', compact('sponsor'))->withTitle("Sponsor");
    }

    /**
     * Update the specified sponsor in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $sponsor = Sponsor::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Sponsor::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $sponsor->update($data);

        return Redirect::route('sponsors.index');
    }

    /**
     * Remove the specified sponsor from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $sponsor         = Sponsor::findOrFail($id);
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/sponsor' . DIRECTORY_SEPARATOR . $sponsor->logo;
        try {
            File::delete($destinationPath);
        } catch (FileNotFound $e) {
            // File sudah dihapus/tidak ada
        }

        Sponsor::destroy($id);

        return Redirect::route('admin.sponsors.index')->with("successMessage", "Sponsor berhasil dihapus")->withTitle("Sponsor");
    }

}
