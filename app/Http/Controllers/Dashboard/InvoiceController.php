<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        if($request->has('status'))
            $invoices = Invoice::query()->with('designer','customer')->where('status', $request->status)->orderBy('id', 'DESC')->paginate(30);
        else
            $invoices = Invoice::query()->with('designer','customer')->orderBy('id', 'DESC')->paginate(30);

        return view('dashboard.invoice.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $designers = User::where('type', 'OPERATOR')->get();
        return view('dashboard.invoice.create', compact('designers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'price' => 'required|integer',
            'designer_id' => 'required',
            'customer_id' => 'required',
        ]);


        Invoice::query()->create($request->all());

        session()->flash('msg', __('messages.store', ['params' => __('input.invoice')]));
        return redirect()->route('invoice.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
