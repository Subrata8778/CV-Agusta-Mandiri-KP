<?php

namespace App\Http\Controllers;

use App\Models\Advertising;
use App\Models\AdvertisingPhoto;
use App\Models\Appointment;
use App\Models\Car;
use App\Models\CarPhoto;
use App\Models\Property;
use App\Models\PropertyPhoto;
use Illuminate\Http\Request;
use PDOException;

class AppointmentAdminController extends Controller
{
    public function indexProcess()
    {
        $apps = Appointment::where('order_status', 'Processed')->orderBy('date')->orderBy('start')->get();

        return view('admin.appointment.process', compact('apps'));
    }

    public function indexFinish()
    {
        $apps = Appointment::where('order_status', 'Finished')->orderBy('date')->orderBy('start')->get();

        return view('admin.appointment.finish', compact('apps'));
    }

    public function indexCancel()
    {
        $apps = Appointment::where('order_status', 'Cancelled')->orderBy('date')->orderBy('start')->get();

        return view('admin.appointment.cancel', compact('apps'));
    }

    public function detail($id)
    {
        $app = Appointment::find($id);

        if ($app->product_type == "Adv") {
            $products = Advertising::all();
            $path = "adv_product_id";
            $photos = AdvertisingPhoto::all();
        } elseif ($app->product_type == "Car") {
            $products = Car::all();
            $path = "car_product_id";
            $photos = CarPhoto::all();
        } elseif ($app->product_type == "Prop") {
            $products = Property::all();
            $path = "prop_product_id";
            $photos = PropertyPhoto::all();
        }

        return view('admin.appointment.detail', compact('app', 'products', 'path', 'photos'));
    }

    public function edit($id)
    {
        $app = Appointment::find($id);

        if ($app->product_type == "Adv") {
            $products = Advertising::all();
            $path = "adv_product_id";
            $photos = AdvertisingPhoto::all();
        } elseif ($app->product_type == "Car") {
            $products = Car::all();
            $path = "car_product_id";
            $photos = CarPhoto::all();
        } elseif ($app->product_type == "Prop") {
            $products = Property::all();
            $path = "prop_product_id";
            $photos = PropertyPhoto::all();
        }

        return view('admin.appointment.edit', compact('app', 'products', 'path', 'photos'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'order_status' => 'required',
            'order_id' => 'required|numeric',
        ]);

        try {
            $app = Appointment::find($request->order_id);
            $app->order_status = $request->order_status;
            $app->save();

            if ($app->order_status == "Processed") {
                return redirect()->route('admin.appointment.indexProcess');
            } elseif ($app->order_status == "Finished") {
                return redirect()->route('admin.appointment.indexFinish');
            } elseif ($app->order_status == "Cancelled") {
                return redirect()->route('admin.appointment.indexCancel');
            }
        } catch (PDOException $e) {
            return redirect()->back()->with('Failed', 'Terjadi kesalahan: ' + $e->getMessage());
        }
    }
}
