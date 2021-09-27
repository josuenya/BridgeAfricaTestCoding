<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::where('user_id', Auth::user()->id)->paginate('8');

        return Inertia::render('Dashboard', [
            'products' => $products,
        ]);
    }
} 
