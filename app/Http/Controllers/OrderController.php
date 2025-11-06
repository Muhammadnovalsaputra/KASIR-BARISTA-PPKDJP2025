<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\category;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use Termwind\Components\Raw;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = "All Transaction";
        $datas = [];
        return view('order.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = category::get();
        $prefix = "ODR";
        $date = now()->format('dmY');


        $lastTransaction = order::whereDate('created_at', now()->toDateString())
            ->orderBy('id', 'desc')->first();

        $lastNumber = 0;

        if ($lastTransaction) {
            $lastNumber = (int) substr($lastTransaction->order_code, -4);
        }

        $runningNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        $order_code = $prefix . "-" . "-" . $date . "-" . $runningNumber;
        return view('order.create', compact('categories', 'order_code'));
    }

    public function getProducts(Request $request)
    {
        try {
            $products = product::with('category')->get();
            return response()->json([
                'message' => 'Fetch Product Success',
                'status' => true,
                'data' => $products
            ]);
            //code...
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([
                'message' => 'Fetch Product Failed',
                'status' => false,
                'error' => $th->getMessage()
            ], 500);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
