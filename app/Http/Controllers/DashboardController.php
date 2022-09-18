<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $entradas = [0, 10, 5, 2, 20, 30, 45, 0, 0, 0, 0, 0];
    $saidas = [50, 41, 10, 15, 23, 45, 60, 0, 0, 0, 0, 0];
    return view('dashboard', compact('entradas', 'saidas'));
  }
}
