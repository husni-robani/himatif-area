<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PeriodFormRequest;
use App\Models\Period;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PeriodController extends Controller
{
    public function index()
    {

        $periods = Period::all();

        return Inertia::render('Admin/Period/Index', compact('periods'));
    }

    public function store(PeriodFormRequest $request)
    {
        try {
            $period = new Period();
            $period->name = $request->name;
            $period->year = $request->year;
            $period->description = $request->description;
            $period->vision = $request->vision;
            $period->mission = $request->mission;
            $period->save();
        } catch (\Exception $exception) {
            return to_route('admin.periods.index')->with('failed', 'failed to create new period');
        }

        return to_route('admin.periods.index');
    }

    public function destroy(string $year)
    {
        $period = Period::where('year', $year)->first();
        $period->delete();

        return back();
    }

    public function edit(string $year)
    {
        $period = Period::where('year', $year)->first();
        dd($period);
    }
}
