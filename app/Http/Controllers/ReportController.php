<?php

namespace App\Http\Controllers;

use App\Models\Advertising;
use App\Models\Appointment;
use App\Models\Car;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function adv(Request $request)
    {
        $apps = Appointment::where('product_type', 'Adv')
            ->whereBetween('created_at', [$request->awal, $request->akhir])
            ->whereIn('order_status', ['Processed', 'Finished'])
            ->get();

        $products = [];

        foreach ($apps as $app) {
            $product_ids = explode(';', $app->product_id);

            foreach ($product_ids as $product_id) {
                if (!isset($products[$product_id]['id'])) {
                    $find = Advertising::find($product_id);
                    $products[$product_id] = [
                        'id' => $find->id,
                        'name' => $find->name,
                        'category' => $find->category,
                        'quantity' => 1,
                    ];
                } else {
                    $products[$product_id]['quantity']++;
                }
            }
        }

        usort($products, function ($a, $b) {
            return $b['quantity'] <=> $a['quantity'];
        });

        return response()->json(compact('products'));
    }

    public function car(Request $request)
    {
        $apps = Appointment::where('product_type', 'Car')
            ->whereBetween('created_at', [$request->awal, $request->akhir])
            ->whereIn('order_status', ['Processed', 'Finished'])
            ->get();

        $products = [];

        foreach ($apps as $app) {
            $product_ids = explode(';', $app->product_id);

            foreach ($product_ids as $product_id) {
                if (!isset($products[$product_id]['id'])) {
                    $find = Car::find($product_id);
                    $products[$product_id] = [
                        'id' => $find->id,
                        'brand' => $find->car_brand->brand,
                        'category' => $find->car_category->category,
                        'title' => $find->title,
                        'year' => $find->year,
                        'price' => $find->price,
                        'quantity' => 1,
                    ];
                } else {
                    $products[$product_id]['quantity']++;
                }
            }
        }

        usort($products, function ($a, $b) {
            return $b['quantity'] <=> $a['quantity'];
        });

        return response()->json(compact('products'));
    }

    public function prop(Request $request)
    {
        $apps = Appointment::where('product_type', 'Prop')
            ->whereBetween('created_at', [$request->awal, $request->akhir])
            ->whereIn('order_status', ['Processed', 'Finished'])
            ->get();

        $products = [];

        foreach ($apps as $app) {
            $product_ids = explode(';', $app->product_id);

            foreach ($product_ids as $product_id) {
                if (!isset($products[$product_id]['id'])) {
                    $find = Property::find($product_id);
                    $products[$product_id] = [
                        'id' => $find->id,
                        'category' => $find->category,
                        'type' => $find->type,
                        'regency' => $find->village->district->regency->name,
                        'title' => $find->title,
                        'price' => $find->price,
                        'quantity' => 1,
                    ];
                } else {
                    $products[$product_id]['quantity']++;
                }
            }
        }

        usort($products, function ($a, $b) {
            return $b['quantity'] <=> $a['quantity'];
        });

        return response()->json(compact('products'));
    }

    public function user()
    {
        $users = User::leftJoin('appointments', 'users.id', '=', 'appointments.user_id')
            ->select(
                'users.id as u_id',
                'users.name as user_name',
                DB::raw('DATE(users.created_at) as user_register'),
                DB::raw('COUNT(appointments.user_id) as total'),
                DB::raw('MAX(DATE(appointments.created_at)) as last')
            )
            ->where('users.role', 'Customer')
            ->whereIn('appointments.order_status', ['Processed', 'Finished'])
            ->groupBy('u_id', 'user_name', 'user_register')
            ->get();

        foreach ($users as $key => $user) {
            $start = Carbon::parse($user->user_register);
            $end = Carbon::today();
            $days = $end->diffInDays($start);
            $users[$key]['since'] = $days;

            $apps = $user->total;

            $ave = $apps / ($days + 1);
            $users[$key]['average'] = $ave;
        }

        $arr = $users->toArray();

        usort($arr, function ($a, $b) {
            return $b['average'] <=> $a['average'];
        });

        return view('admin.report.user', compact('arr'));
    }
}
