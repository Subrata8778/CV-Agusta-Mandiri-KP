<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\CarBrand;
use App\Models\CarCategory;
use App\Models\CarPhoto;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::orderByDesc('created_at')->get();

        return view('admin.car.carsell', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = CarBrand::orderBy('brand', 'asc')->get();
        $categories = CarCategory::orderBy('category', 'asc')->get();

        return view('admin.car.carsellcreate', compact('brands', 'categories'));
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
            'year' => 'required|numeric|max:'.(date('Y')),
            'brand' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'km' => 'required|numeric',
            'transmission' => 'required',
            'capacity' => 'required',
            'fuel' => 'required',
            'desc' => 'required',
            'photos' => 'required',
            'photos.*' => 'image|mimes:jpeg,jpg,png,svg,gif,webp,jfif'
        ]);

        if ($request->hasFile('photos')) {
            $files = $request->file('photos');

            $product = Car::create([
                'title' => $request->title,
                'year' => $request->year,
                'price' => $request->price,
                'kilometre' => $request->km,
                'transmission' => $request->transmission,
                'capacity' => $request->capacity,
                'fuel' => $request->fuel,
                'description' => $request->desc,
                'sell_status' => 'Available',
                'car_brand_id' => $request->brand,
                'car_category_id' => $request->category
            ]);

            foreach($files as $file) {
                $filename = $file->store('car');

                CarPhoto::create([
                    'car_product_id' => $product->id,
                    'url' => $filename
                ]);
            }
        }

        return redirect()->route('admin.car.sell.show', $product->id)->with('status', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
        $photos = CarPhoto::where('car_product_id', $id)->get();

        return view('admin.car.carsellshow', compact('car', 'photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        $brands = CarBrand::orderBy('brand', 'asc')->get();
        $categories = CarCategory::orderBy('category', 'asc')->get();
        $photos = CarPhoto::where('car_product_id', $id)->get();

        return view('admin.car.carselledit', compact('car', 'brands', 'categories', 'photos'));
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
            'year' => 'required|numeric|max:'.(date('Y')),
            'brand' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'kilometre' => 'required|numeric',
            'transmission' => 'required',
            'capacity' => 'required',
            'fuel' => 'required',
            'desc' => 'required',
            'sell_status' => 'required',
            'photos.*' => 'image|mimes:jpeg,jpg,png,svg,gif,webp,jfif'
        ]);

        $delPhotos = $request->del_photos[0];

        if (!empty($delPhotos)) {
            $delPhotoIds = explode(',', $delPhotos);

            $existPhotos = CarPhoto::where('car_product_id', $id)->count();

            if (count($delPhotoIds) < $existPhotos) {
                foreach ($delPhotoIds as $del) {
                    $photo = CarPhoto::find($del);
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

        $car = Car::find($id);
        $car->title = $request->title;
        $car->year = $request->year;
        $car->car_brand_id = $request->brand;
        $car->car_category_id = $request->category;
        $car->price = $request->price;
        $car->kilometre = $request->kilometre;
        $car->transmission = $request->transmission;
        $car->capacity = $request->capacity;
        $car->fuel = $request->fuel;
        $car->description = $request->desc;
        $car->sell_status = $request->sell_status;
        $car->save();

        if ($request->hasFile('photos')) {
            $files = $request->file('photos');

            foreach ($files as $file) {
                $filename = $file->store('car');

                CarPhoto::create([
                    'car_product_id' => $car->id,
                    'url' => $filename
                ]);
            }
        }

        return redirect()->route('admin.car.sell.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photos = CarPhoto::where('car_product_id', $id)->get();

        foreach ($photos as $photo) {
            $img = CarPhoto::find($photo->id);
            $storage = public_path('storage/' . $photo->url);
            if (file_exists($storage)) {
                unlink($storage);
            }
            $img->delete();
        }

        Car::find($id)->delete();

        return redirect()->route('admin.car.sell.index');
    }
}
