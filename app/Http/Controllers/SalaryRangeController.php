<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\SalaryRange;
use Illuminate\Http\Request;

class SalaryRangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salary-ranges.index', [
            'title' => "Salary Range",
            'salaryRanges' => SalaryRange::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salary-ranges.create', [
            'title' => "Create New Salary Range",
            'levels' => Level::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'level_id' => 'required',
            'base_salary' => 'required|decimal',
        ]);

        SalaryRange::create($validated);
        return redirectWithAlert('salary-ranges', 'success', 'Salary Range Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalaryRange  $salaryRange
     * @return \Illuminate\Http\Response
     */
    public function show(SalaryRange $salaryRange)
    {
        return view('salary-ranges.show', [
            'title' => "Salary Range Info",
            'salaryRange' => $salaryRange,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalaryRange  $salaryRange
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SalaryRange $salaryRange)
    {
        return view('salary-ranges.edit', [
            'title' => "Edit Salary Range",
            'salaryRange' => $salaryRange,
            'levels' => Level::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalaryRange  $salaryRange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalaryRange $salaryRange)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'level_id' => 'required',
            'base_salary' => 'required|decimal',
        ]);

        $salaryRange->update($validated);
        return redirectWithAlert('levels', 'success', 'Salary Range Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalaryRange  $salaryRange
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalaryRange $salaryRange)
    {
        $salaryRange->delete();
        return redirectWithAlert('salary-ranges', 'success', 'Salary Range Deleted Successfully');
    }
}
