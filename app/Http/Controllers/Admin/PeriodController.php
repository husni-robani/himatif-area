<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PeriodFormRequest;
use App\Models\Period;
use App\Services\Period\GetPeriodService;
use App\Services\Period\PeriodActiveStatusService;
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
            $period = Period::create($request->all());

        } catch (\Exception $exception) {
            return to_route('admin.periods.index');
        }

        return to_route('admin.periods.index');
    }

    public function destroy(Request $request, string $year)
    {
        try {
            //Todo: !!! tambahkan logic, apabila period yang akan di hapus merupakan period aktif, maka pindahkan status active ke period lain, apabila tidak ada lagi period, maka penghapusan tidak bisa
            $period = GetPeriodService::getFromYear($year);
            if ($period->getAttribute('active')) {
                return to_route('admin.periods.index');
            }
            $period->delete();
            return to_route('admin.periods.index')->with('success', 'Deleting period success');
        } catch (\Throwable $exception) {
            return $exception;
        }
    }

    public function edit(string $year)
    {
        try {
            $period = GetPeriodService::getFromYear($year);
            return Inertia::render('Admin/Period/Edit', compact('period'));
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function update(Request $request, $year)
    {
        try {
            $period = GetPeriodService::getFromYear($year);
            $period->update($request->all());
        } catch (\Exception $exception) {
            return $exception;
        }

        return to_route('admin.periods.index');
    }

    public function changeActive($year)
    {

        try {
            $period = GetPeriodService::getFromYear($year);
            $result = (new PeriodActiveStatusService())->changeActiveStatusTo($period);
            if ($result) {
                return to_route('admin.periods.index')->isSuccessful();
            } else {
                return to_route('admin.periods.index')->isInvalid();
            }
        } catch (\Exception $exception) {
            return $exception;
        }

    }
}
