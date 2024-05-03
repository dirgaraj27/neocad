<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\User;
use App\Models\ServiceType;
use App\Models\PriceBook;
use Illuminate\Http\Request;

class PriceBookController extends Controller
{

    public function index()
    {
        $pricebook = pricebook::with('user', 'serviceType', 'service')->get();
        return view('admin.pricebook.index', compact('pricebook'));
    }

    public function create()
    {
        $users = User::where('role', 1)->get(); // Retrieve users with role 1
        $serviceTypes = ServiceType::all();
        $services = Service::all();

        return view('admin.pricebook.create', compact('users', 'serviceTypes', 'services'));
    }

}
