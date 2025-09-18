<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Show the store homepage.
     */
    public function index()
    {
        return view('store.index');
    }

    /**
     * Show the collections page.
     */
    public function collections()
    {
        return view('store.collections');
    }

    /**
     * Show the product details page.
     */
    public function productDetails()
    {
        return view('store.productdetails');
    }

    /**
     * Show the coming soon page.
     */
    public function comingSoon()
    {
        return view('coming-soon');
    }
}