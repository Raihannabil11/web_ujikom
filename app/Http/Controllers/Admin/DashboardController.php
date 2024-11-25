<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Info;
use App\Models\Agenda;
use App\Models\Activity; // Pastikan ini ditambahkan
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    $totalUsers = User::count();
    $totalGalleries = Gallery::count();
    $totalInfos = Info::count();
    $totalAgendas = Agenda::count();

    // Ambil 5 aktivitas terbaru
    $recentActivities = Activity::orderBy('created_at', 'desc')->take(5)->get();

    return view('admin.dashboard', compact('totalUsers', 'totalGalleries', 'totalInfos', 'totalAgendas', 'recentActivities'));
    }
}
