<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function index()
    {
        return view('pages.welcome');
    }

    public function about()
    {
        $username = "Mohammad Haikal";
        $skills = [
            '1' => 'Programming',
            '2' => 'Security',
            '3' => 'Networking'
        ];
        return view('pages.about')
            ->with('username', $username)
            ->with('skills', $skills);
    }
    
    public function contact($id)
    {
        $names = [
            '1' => ['Ahmad', 24],
            '2' => ['Mohammad Haikal', 20],
            '3' => ['Tareq', 30]
        ];

        return view('pages.contact', [
            'name' => $names[$id][0] ?? 'Name not found',
            'age' => $names[$id][1] ?? 'Age not found'
        ]);
    }
}
