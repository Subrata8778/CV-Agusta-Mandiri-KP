<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class IndonesiaController extends Controller
{
    public function regencies($id)
    {
        $data = Regency::where('province_id', $id)->where('name', 'LIKE', '%'.request('q').'%')->paginate(10);

        return response()->json($data);
    }

    public function districts($id)
    {
        $data = District::where('regency_id', $id)->where('name', 'LIKE', '%'.request('q').'%')->paginate(10);

        return response()->json($data);
    }

    public function villages($id)
    {
        $data = Village::where('district_id', $id)->where('name', 'LIKE', '%'.request('q').'%')->paginate(10);

        return response()->json($data);
    }
}
