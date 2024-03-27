<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use PDOException;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ports = Portofolio::all();

        return view('admin.portfolio.portfolio', compact('ports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.portfoliocreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'photo' => 'required',
            'photo.*' => 'image|mimes:jpeg,jpg,png,svg,gif,webp,jfif'
        ]);

        try {
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = $file->store('porto');

                $porto = Portofolio::create([
                    'title' => $request->title,
                    'description' => $request->description,
                    'category' => $request->category,
                    'photo' => $filename
                ]);
            }

            return redirect()->route('admin.portfolio.show', $porto->id);
        } catch (PDOException $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Terjadi kesalahan. ' + $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $port = Portofolio::find($id);

        return view('admin.portfolio.portfolioshow', compact('port'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $port = Portofolio::find($id);

        return view('admin.portfolio.portfolioedit', compact('port'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'photo' => 'required',
            'photo.*' => 'image|mimes:jpeg,jpg,png,svg,gif,webp,jfif'
        ]);

        try {
            $port = Portofolio::find($id);
            $port->title = $request->title;
            $port->description = $request->description;
            $port->category = $request->category;

            if ($request->hasFile('photo')) {
                $storage = public_path('storage/' . $port->photo);
                if (file_exists($storage)) {
                    unlink($storage);
                }

                $file = $request->file('photo');
                $filename = $file->store('porto');

                $port->photo = $filename;
            }

            $port->save();

            return redirect()->route('admin.portfolio.show', $id);
        } catch (PDOException $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Terjadi kesalahan. ' + $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img = Portofolio::find($id);

        if ($img) {
            $storage = public_path('storage/' . $img->photo);
            if (file_exists($storage)) {
                unlink($storage);
            }
        }

        Portofolio::find($id)->delete();

        return redirect()->route('admin.portfolio.index');
    }
}
