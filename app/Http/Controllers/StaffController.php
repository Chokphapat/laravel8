<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 5;

        $search = $request->get('search');
        if (!empty($search)) {
            $staffs = Staff::where('title', 'LIKE', "%$search%")
                ->orWhere('birthdate', 'LIKE', "%$search%")
                ->orWhere('salary', 'LIKE', "%$search%")
                ->orWhere('photo', 'LIKE', "%$search%")
                ->orderBy('birthdate', 'desc')->paginate($perPage);
        } else {
            $staffs = Staff::orderBy('birthdate', 'desc')->paginate($perPage);
        }

        return view('staff.index', compact('staffs'));
    }

    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'salary' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('', 'public');
            $requestData['photo'] = url(Storage::url($path));
        }

        Staff::create($requestData);

        return redirect('staff')->with('success', 'Staff created successfully.');
    }

    public function show($id)
    {
        $staff = Staff::findOrFail($id);

        return view('staff.show', compact('staff'));
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);

        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $requestData = $request->all();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('', 'public');
            $requestData['photo'] = url(Storage::url($path));
        }

        $staff = Staff::findOrFail($id);
        $staff->update($requestData);

        return redirect('staff')->with('success', 'Staff updated successfully.');
    }

    public function destroy($id)
    {
        Staff::destroy($id);

        return redirect('staff')->with('success', 'Staff deleted successfully.');
    }
}
