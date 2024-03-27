<?php

namespace App\Http\Controllers;

use App\Models\Advertising;
use App\Models\AdvertisingPhoto;
use App\Models\Appointment;
use App\Models\Car;
use App\Models\CarBrand;
use App\Models\CarCategory;
use App\Models\CarPhoto;
use App\Models\Portofolio;
use App\Models\Property;
use App\Models\PropertyPhoto;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'Customer')->count();
        $appointments = Appointment::whereIn('order_status', ['Processed', 'Finished'])->count();
        $advs = Advertising::all()->count();
        $cars = Car::where('sell_status', 'Sold')->count();
        $props = Property::where('status', 'Sold')->count();
        $cps = $cars + $props;
        $portos = Portofolio::all();

        return view('index', compact('users', 'appointments', 'advs', 'cps', 'portos'));
    }

    public function advs()
    {
        $advs = Advertising::orderBy('name', 'asc')->get();
        $photos = AdvertisingPhoto::all();

        return view('customer.adv.adv', compact('advs', 'photos'));
    }
    
    public function adv_detail($id)
    {
        $adv = Advertising::find($id);
        $photos = AdvertisingPhoto::where('adv_product_id', $id)->get();

        return view('customer.adv.advdetail', compact('adv', 'photos'));
    }

    public function cars()
    {
        $cars = Car::where('sell_status', 'Available')->get();
        $photos = CarPhoto::all();
        $brands = CarBrand::orderBy('brand', 'asc')->get();
        $categories = CarCategory::orderBy('category', 'asc')->get();

        return view('customer.car.car', compact('cars', 'photos', 'brands', 'categories'));
    }

    public function car_Detail($id)
    {
        $car = Car::find($id);
        $photos = CarPhoto::where('car_product_id', $id)->get();

        return view('customer.car.cardetail', compact('car', 'photos'));
    }

    public function props()
    {
        $props = Property::where('status', 'Available')->get();
        $photos = PropertyPhoto::all();

        return view('customer.prop.prop', compact('props', 'photos'));
    }

    public function prop_detail($id)
    {
        $prop = Property::find($id);
        $photos = PropertyPhoto::where('prop_product_id', $id)->get();

        return view('customer.prop.propdetail', compact('prop', 'photos'));
    }

    public function porto_detail($id)
    {
        $porto = Portofolio::find($id);

        return view('customer.portfoliodetail', compact('porto'));
    }
}
