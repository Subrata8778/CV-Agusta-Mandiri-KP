<?php

namespace App\Http\Controllers;

use App\Models\AdvertisingCart;
use App\Models\AdvertisingPhoto;
use App\Models\User;
use Illuminate\Http\Request;
use PDOException;

class AdvertisingCartController extends Controller
{
    private function duplicated(PDOException $e)
    {
        return $e->getCode() == 23000 || $e->getCode() == 1062;
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric',
            'adv_product_id' => 'required|numeric'
        ]);

        try {
            AdvertisingCart::create([
                'user_id' => $request->user_id,
                'adv_product_id' => $request->adv_product_id,
            ]);

            return response()->json([
                'status' => 'Success',
            ], 201);
        } catch (PDOException $e) {
            if ($this->duplicated($e)) {
                return response()->json([
                    'status' => 'Failed',
                    'message' => 'Produk sudah ada di keranjangmu',
                ], 500);
            }

            return response()->json([
                'status' => 'Failed',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function showUserCart($id)
    {
        $user = User::find($id);
        $photos = AdvertisingPhoto::all();

        return view('customer.cart.adv', compact('user', 'photos'));
    }

    public function deleteCartItem($user_id, $item_id)
    {
        try {
            AdvertisingCart::where('user_id', $user_id)->where('adv_product_id', $item_id)->delete();
            
            return response()->json([
                'status' => 'Success',
            ], 201);
        } catch (PDOException $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Terjadi kesalahan. Silahkan coba lagi. ' + $e->getMessage(),
            ], 500);
        } 
    }
}
