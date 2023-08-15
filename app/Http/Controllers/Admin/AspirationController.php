<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspiration;
use App\Services\GetAspirationService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AspirationController extends Controller
{
    public function index()
    {
        try {
            //get all aspiration
            $aspirations = Aspiration::all();
            return Inertia::render('Admin/Aspiration/Index', compact('aspirations'));
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function destroy($id)
    {
        try {
            $aspiration = GetAspirationService::fromId($id);
            $aspiration->delete();

            to_route('admin.periods.index');

        } catch (\Exception $exception) {
            return $exception;
        }
    }
}
