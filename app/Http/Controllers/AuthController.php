<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $credentials = $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials, $request->filled('remember'))) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            }

            return back()->withErrors([
                'username' => 'Username atau password salah.',
            ])->onlyInput('username');
        }

        return view('auth.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function dashboard()
    {
        try {
            $totalDocuments = Document::count();
            $totalSize = Document::sum('file_size') ?? 0;
            $totalCategories = Category::count();
            
            // Monthly upload statistics
            $monthlyStats = Document::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('COUNT(*) as count')
            )
            ->whereYear('created_at', date('Y'))
            ->groupBy('year', 'month')
            ->orderBy('month')
            ->get();

            $recentDocuments = Document::with(['category', 'user'])
                ->latest()
                ->take(5)
                ->get();

            $categories = Category::withCount('documents')
                ->whereNull('parent_id')
                ->get();

            return view('dashboard', compact(
                'totalDocuments',
                'totalSize',
                'totalCategories',
                'monthlyStats',
                'recentDocuments',
                'categories'
            ));
        } catch (\Exception $e) {
            // If error, return with empty data
            return view('dashboard', [
                'totalDocuments' => 0,
                'totalSize' => 0,
                'totalCategories' => 0,
                'monthlyStats' => [],
                'recentDocuments' => [],
                'categories' => []
            ]);
        }
    }
}