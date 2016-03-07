<?php

class DocumentsController extends \BaseController
{

    /**
     * Display a listing of documents
     *
     * @return Response
     */
    public function index()
    {
        $documents = Document::orderBy('name')->get();

        return View::make('documents.index', compact('documents'))->withTitle('Documents');
    }

    /**
     * Show the form for creating a new document
     *
     * @return Response
     */
    public function create()
    {
        return View::make('documents.create')->withTitle('Tambah Dokumen');
    }

    /**
     * Store a newly created document in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Document::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Input::hasFile('file')) {
            $uploaded_file   = Input::file('file');
            $extension       = $uploaded_file->getClientOriginalExtension();
            $filename        = Input::get('name') . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/documents';
            $uploaded_file->move($destinationPath, $filename);

            $data['file'] = $filename;
            Document::create($data);
            return Redirect::route('admin.documents.index')->with("successMessage", "Dokumen berhasil ditambahkan");
        }
    }

    /**
     * Display the specified document.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $document = Document::findOrFail($id);

        return View::make('documents.show', compact('document'));
    }

    /**
     * Show the form for editing the specified document.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $document = Document::find($id);

        return View::make('documents.edit', compact('document'));
    }

    /**
     * Update the specified document in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $document = Document::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Document::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $document->update($data);

        return Redirect::route('documents.index');
    }

    /**
     * Remove the specified document from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $document        = Document::findOrFail($id);
        $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/documents' . DIRECTORY_SEPARATOR . $document->file;
        try {
            File::delete($destinationPath);
        } catch (FileNotFound $e) {
            // File sudah dihapus/tidak ada
        }

        Document::destroy($id);

        return Redirect::route('admin.documents.index')->with('successMessage', 'Dokumen berhasil dihapus');
    }

}
