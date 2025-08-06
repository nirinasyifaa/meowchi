<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatGameController extends Controller
{
    public function index()
    {
        // Ambil kucing pertama, kalau belum ada, buat baru
        $cat = Cat::first();

        if (!$cat) {
            $cat = Cat::create([
                'name' => 'Meowchi',
                'hunger' => 50,
                'happiness' => 50,
            ]);
        }

        return view('cat.index', compact('cat'));
    }

    public function feed()
    {
        $cat = Cat::first();

        if ($cat) {
            // Kurangi rasa lapar, minimal 0
            $cat->hunger = max(0, $cat->hunger - 10);

            // Kalau lapar berkurang, kebahagiaan naik sedikit
            $cat->happiness = min(100, $cat->happiness + 5);

            $cat->save();
        }

        return redirect()->back();
    }

    public function play()
    {
        $cat = Cat::first();

        if ($cat) {
            // Tambah kebahagiaan, maksimal 100
            $cat->happiness = min(100, $cat->happiness + 10);

            // Main bikin lapar sedikit naik
            $cat->hunger = min(100, $cat->hunger + 5);

            $cat->save();
        }

        return redirect()->back();
    }
}
