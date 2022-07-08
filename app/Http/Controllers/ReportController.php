<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $total = [];
        $reports = Order::with('user')->with(['carts', 'carts.product'])->with('payment')->get();

        // for ($i=0; $i < count($reports); $i++) {
        //     $total[$i] = 0;
        //     for ($j=0; $j < $reports[$i]->carts; $j++) {
        //         $total[$i] = $reports[$i]->carts[$j]->product->product_price;
        //     }
        // }
        // dd($total);
        // dd($reports);
        return view('pages.adminPages.report.index', compact('reports'));
    }
}
