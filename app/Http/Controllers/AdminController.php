<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() //Overview
{
    $projects = \App\Models\Proyek::select(
        DB::raw("MONTH(created_at) as month"),
        DB::raw("COUNT(*) as total")
    )
    ->groupBy('month')
    ->orderBy('month')
    ->get();

    $projectLabels = $projects->map(function($p){
        return date('M', mktime(0,0,0,$p->month, 1));
    });
    $projectData = $projects->pluck('total');

    // Data Services per kategori (Doughnut Chart)
    $services = \App\Models\Services::select('jenis', DB::raw('count(*) as total'))
        ->groupBy('jenis')
        ->get();

    $serviceLabels = $services->pluck('jenis');
    $serviceData = $services->pluck('total');
    
    $proyek = \App\Models\Proyek::count();

    return view('admin.index', compact(
        'projectLabels','projectData','serviceLabels','serviceData','proyek'
    ));
}


    public function profil()
    {
        
        return view('admin.profil');
    }

    public function layanan()
    {
        $service = \App\Models\Services::all();
        return view('admin.layanan',compact('service'));
    }

    public function portofolio()
    {
        $portfolio = Portfolio::all();
        return view('admin.portofolio',compact('portfolio'));
    }
    

    function pesan()
    {
        $message = \App\Models\Message::all();
        return view('admin.pesan',compact('message'));
    }

    function pengguna()
    {
        return view('admin.pengguna');
    }

    function pengaturan()
    {
        return view('admin.pengaturan');
    }
}
