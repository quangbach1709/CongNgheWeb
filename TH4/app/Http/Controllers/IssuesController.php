<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Support\Facades\Validator;

class IssuesController extends Controller
{
    public function index()
    {
        $issues = Issue::with('computer')->paginate(10);
        return view('issues.index', compact('issues'));
    }

    public function create()
    {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reported_by' => 'required|max:100',
            'reported_date' => 'required|date',
            'urgency' => 'required|in:low,medium,high',
            'status' => 'required|in:open,in progress,resolved',
            'computer_id' => 'required',
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Issue được tạo thành công!');
    }
    public function edit($id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }


    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'reported_by' => 'required|max:100',
                'reported_date' => 'required|date',
                'urgency' => 'required|in:low,medium,high',
                'status' => 'required|in:open,in progress,resolved',
                'computer_id' => 'required',
            ]);

            $issue = Issue::findOrFail($id);
            $issue->update($request->all());

            return redirect()->route('issues.index')->with('success', 'Issue được cập nhật thành công!');
        } catch (\Exception $e) {
            Log::error('Error updating issue: ' . $e->getMessage());

            return redirect()->back()
                ->withErrors(['error' => 'Có lỗi xảy ra: ' . $e->getMessage()])
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();
        return redirect()->route('issues.index')->with('success', 'Issue deleted successfully.');
    }

}
