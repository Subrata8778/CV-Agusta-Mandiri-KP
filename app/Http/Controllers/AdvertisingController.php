<?php

namespace App\Http\Controllers;

use App\Models\Advertising;
use App\Models\AdvertisingPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advs = Advertising::orderBy('name')->get();

        return view('admin.adv.adv', compact('advs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adv.advcreate');
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
            'name' => 'required',
            'category' => 'required',
            'photos' => 'required|array',
            'photos.*' => 'image|mimes:jpeg,jpg,png,svg,gif,webp,jfif'
        ]);

        if ($request->hasFile('photos')) {
            $files = $request->file('photos');

            $product = Advertising::create([
                'name' => $request->name,
                'category' => $request->category
            ]);

            foreach ($files as $file) {
                $filename = $file->store('adv');

                AdvertisingPhoto::create([
                    'adv_product_id' => $product->id,
                    'url' => $filename
                ]);
            }
        }

        return redirect()->route('admin.advertising.show', $product->id)->with('status', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adv = Advertising::find($id);
        $photos = AdvertisingPhoto::where('adv_product_id', $id)->get();

        return view('admin.adv.advshow', compact('adv', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adv = Advertising::find($id);
        $photos = AdvertisingPhoto::where('adv_product_id', $id)->get();

        return view('admin.adv.advedit', compact('adv', 'photos'));
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
            'name' => 'required',
            'category' => 'required',
            'photos.*' => 'image|mimes:jpeg,jpg,png,svg,gif,webp,jfif'
        ]);

        $delPhotos = $request->del_photos[0];

        if (!empty($delPhotos)) {
            $delPhotoIds = explode(',', $delPhotos);

            $existPhotos = AdvertisingPhoto::where('adv_product_id', $id)->count();

            if (count($delPhotoIds) < $existPhotos) {
                foreach ($delPhotoIds as $del) {
                    $photo = AdvertisingPhoto::find($del);
                    $storage = public_path('storage/' . $photo->url);
                    if (file_exists($storage)) {
                        unlink($storage);
                    }
                    $photo->delete();
                }
            } else {
                $request->validate([
                    'photos' => 'required',
                ]);
            }
        }

        $adv = Advertising::find($id);
        $adv->name = $request->name;
        $adv->category = $request->category;
        $adv->save();

        if ($request->hasFile('photos')) {
            $files = $request->file('photos');

            foreach ($files as $file) {
                $filename = $file->store('adv');

                AdvertisingPhoto::create([
                    'adv_product_id' => $adv->id,
                    'url' => $filename
                ]);
            }
        }

        return redirect()->route('admin.advertising.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photos = AdvertisingPhoto::where('adv_product_id', $id)->get();

        foreach ($photos as $photo) {
            $img = AdvertisingPhoto::find($photo->id);
            $storage = public_path('storage/' . $photo->url);
            if (file_exists($storage)) {
                unlink($storage);
            }
            $img->delete();
        }

        Advertising::find($id)->delete();

        return redirect()->route('admin.advertising.index');
    }
}
