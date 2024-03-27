<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyPhoto;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $props = Property::all();

        return view('admin.prop.prop', compact('props'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provs = Province::all();

        return view('admin.prop.propcreate', compact('provs'));
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
            'category' => 'required',
            'type' => 'required',
            'title' => 'required',
            'village' => 'required|numeric',
            'address' => 'required',
            'price' => 'required|numeric',
            'land_area' => 'required|numeric',
            'building_area' => 'nullable|numeric',
            'bedroom' => 'nullable|numeric',
            'bathroom' => 'nullable|numeric',
            'story' => 'nullable|numeric',
            'electricity' => 'nullable|numeric',
            'certificate' => 'required|min:1',
            'desc' => 'required',
            'photos' => 'required',
            'photos.*' => 'image|mimes:jpeg,jpg,png,svg,gif,webp,jfif',
        ]);

        $cert = implode(", ", $request->certificate);

        if ($request->hasFile('photos')) {
            $files = $request->file('photos');

            $product = Property::create([
                'category' => $request->category,
                'type' => $request->type,
                'title' => $request->title,
                'village_id' => $request->village,
                'address' => $request->address,
                'maps' => $request->maps,
                'price' => $request->price,
                'land_area' => $request->land_area,
                'building_area' => $request->building_area,
                'bedroom' => $request->bedroom,
                'bathroom' => $request->bathroom,
                'story' => $request->story,
                'electricity' => $request->electricity,
                'certification' => $cert,
                'description' => $request->desc,
            ]);

            foreach ($files as $file) {
                $filename = $file->store('prop');

                PropertyPhoto::create([
                    'prop_product_id' => $product->id,
                    'url' => $filename
                ]);
            }
        }

        return redirect()->route('admin.property.index', $product->id)->with('status', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prop = Property::find($id);
        $photos = PropertyPhoto::where('prop_product_id', $id)->get();

        return view('admin.prop.propshow', compact('prop', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prop = Property::find($id);
        $photos = PropertyPhoto::where('prop_product_id', $id)->get();
        $provs = Province::all();
        $kabs = Regency::where('province_id', $prop -> village -> district -> regency -> province -> id)->get();
        $kecs = District::where('regency_id', $prop -> village -> district -> regency -> id)->get();
        $desas = Village::where('district_id', $prop -> village -> district -> id)->get();

        return view('admin.prop.propedit', compact('prop', 'photos', 'provs', 'kabs', 'kecs', 'desas'));
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
        dd($request);
        $request->validate([
            'status' => 'required',
            'category' => 'required',
            'type' => 'required',
            'title' => 'required',
            'village' => 'required|numeric',
            'address' => 'required',
            'price' => 'required|numeric',
            'land_area' => 'required|numeric',
            'building_area' => 'nullable|numeric',
            'bedroom' => 'nullable|numeric',
            'bathroom' => 'nullable|numeric',
            'story' => 'nullable|numeric',
            'electricity' => 'nullable|numeric',
            'certificate' => 'required|min:1',
            'desc' => 'required',
            'photos.*' => 'image|mimes:jpeg,jpg,png,svg,gif,webp,jfif',
        ]);

        $cert = implode(", ", $request->certificate);
        $delPhotos = $request->del_photos[0];

        if (!empty($delPhotos)) {
            $delPhotoIds = explode(',', $delPhotos);

            $existPhotos = PropertyPhoto::where('prop_product_id', $id)->count();

            if (count($delPhotoIds) < $existPhotos) {
                foreach ($delPhotoIds as $del) {
                    $photo = PropertyPhoto::find($del);
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

        $prop = Property::find($id);
        $prop->status = $request->status;
        $prop->category = $request->category;
        $prop->type = $request->type;
        $prop->title = $request->title;
        $prop->village_id = $request->village;
        $prop->address = $request->address;
        $prop->maps = $request->maps;
        $prop->price = $request->price;
        $prop->land_area = $request->land_area;
        $prop->building_area = $request->building_area;
        $prop->bedroom = $request->bedroom;
        $prop->bathroom = $request->bathroom;
        $prop->story = $request->story;
        $prop->electricity = $request->electricity;
        $prop->certification = $cert;
        $prop->description = $request->desc;
        $prop->save();

        if ($request->hasFile('photos')) {
            $files = $request->file('photos');

            foreach ($files as $file) {
                $filename = $file->store('prop');

                PropertyPhoto::create([
                    'prop_product_id' => $prop->id,
                    'url' => $filename
                ]);
            }
        }

        return redirect()->route('admin.property.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photos = PropertyPhoto::where('prop_product_id', $id)->get();

        foreach ($photos as $photo) {
            $img = PropertyPhoto::find($photo->id);
            $storage = public_path('storage/' . $photo->url);
            if (file_exists($storage)) {
                unlink($storage);
            }
            $img->delete();
        }

        Property::find($id)->delete();

        return redirect()->route('admin.property.index');
    }
}
