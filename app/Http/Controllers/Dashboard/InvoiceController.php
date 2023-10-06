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
        if ($request->has('status'))
            $invoices = Invoice::query()->with('designer', 'customer')->where('status', $request->status)->orderBy('id', 'DESC')->paginate(30);
        else
            $invoices = Invoice::query()->with('designer', 'customer')->orderBy('id', 'DESC')->paginate(30);

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
            'designer_id' => 'required',
            'customer_id' => 'required',
        ]);

        $data = $request->all();
        $data['price'] = str_replace(',', '', $data['price']);
        $data['discount'] = str_replace(',', '', $data['discount']);
        $data['print_price'] = str_replace(',', '', $data['print_price']);


        Invoice::query()->create($data);

        session()->flash('msg', __('messages.store', ['params' => __('input.invoice')]));
        return redirect()->route('invoice.index', ['status' => 'PROGRESS']);
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
        $designers = User::where('type', 'OPERATOR')->get();
        $invoice = Invoice::with('designer', 'customer')->find($id);

        return view('dashboard.invoice.edit', compact('designers', 'invoice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'price' => 'required|integer',
            'designer_id' => 'required',
            'customer_id' => 'required',
            'status' => 'required',
        ]);

        $invoice = Invoice::with('designer', 'customer')->find($id);

        $invoice->update($request->all());

        session()->flash('msg', __('messages.update', ['params' => __('input.invoice')]));
        return redirect()->route('invoice.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function searchPage(Request $request)
    {
        $invoice = null;
        $designers = null;

        if ($request->search) {
            $designers = User::where('type', 'OPERATOR')->get();
        }

        return view('dashboard.invoice.search_box', compact('designers'));
    }

    public function search(Request $request)
    {
        $invoice = null;

        if ($request->search) {
            $invoice = Invoice::with('designer', 'customer')->find($request->search);
        }

        return response()->json($invoice);
    }
}
