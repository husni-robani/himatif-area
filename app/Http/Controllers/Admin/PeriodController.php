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
            return to_route('admin.periods.index');
        }

        return to_route('admin.periods.index');
    }

    public function destroy(string $year)
    {
        $period = Period::where('year', $year)->first();
        $period->delete();

        return to_route('admin.periods.index')->with('success', 'Deleting period success');
    }

    public function edit(string $year)
    {
        $period = Period::where('year', $year)->first();
        return Inertia::render('Admin/Period/Edit', compact('period'));
    }

    public function update(Request $request, $year)
    {
        try {
            $period = Period::where('year', $year)->first();
            $period->name = $request->name;
            $period->year = $request->year;
            $period->description = $request->description;
            $period->vision = $request->vision;
            $period->mission = $request->mission;
            $period->save();
        } catch (\Exception $exception) {
            return $exception;
        }

        return to_route('admin.periods.index');
    }

    public function changeActive($year)
    {

        try {
            $activePeriod = Period::where('active', 1)->first();
            $activePeriod->active = 0;
            $activePeriod->save();

            $period = Period::where('year', $year)->first();
            $period->active = 1;
            $period->save();
        } catch (\Exception $exception) {
            return $exception;
        }

        return to_route('admin.periods.index');
    }
}
