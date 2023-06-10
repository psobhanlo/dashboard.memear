@extends('dashboard.master')
@section('btn')
    <a class="btn btn-success"
       href="{{route('invoice.create')}}">   {{__('label.store', ['params' => __('input.invoice')])}} </a>
@endsection

@section('title','لیست فاکتورها  ')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> لیست فاکتور ها</h4>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    {{__('input.customer')}}
                                </th>
                                <th>
                                    {{__('input.mobile')}}
                                </th>
                                <th>
                                    {{__('input.price')}}
                                </th>
                                <th>
                                    {{__('input.print')}}
                                </th>
                                <th>
                                    {{__('input.final_price')}}
                                </th>

                                <th>
                                    {{__('input.designer_id')}}
                                </th>
                                <th>
                                    {{__('input.commission_designer')}}
                                </th>
                                <th>
                                    {{__('input.designer_benefit')}}
                                </th>
                                <th>
                                    {{__('input.status')}}
                                </th>
                                <th>
                                    {{__('input.created_at')}}
                                </th>

                                <th>
                                    {{__('input.edit')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td class="py-1">
                                        {{$invoice->id}}
                                    </td>

                                    <td>
                                        {{$invoice->customer->name}}
                                    </td>
                                    <td>
                                        {{$invoice->customer->mobile}}
                                    </td>
                                    <td>
                                        {{number_format($invoice->price)}} تومان
                                    </td>
                                    <td>
                                        @if($invoice->print_count || $invoice->print_price)
                                            {{$invoice->print_count}} عدد
                                            | {{number_format($invoice->print_count * $invoice->print_price)}} تومان
                                        @else
                                            ندارم
                                        @endif
                                    </td>
                                    <td>
                                        {{number_format($invoice->price - ($invoice->print_count * $invoice->print_price) - $invoice->discount)}}
                                        تومان
                                    </td>
                                    <td>
                                        {{$invoice->designer->name}}
                                    </td>
                                    <td>
                                        {{$invoice->designer->commission}} %
                                    </td>
                                    <td>
                                        {{number_format((($invoice->price - ($invoice->print_count * $invoice->print_price) - $invoice->discount) * $invoice->designer->commission)/ 100)}}
                                    </td>

                                    <td>
                                        <a href="#" class="btn
                                        @if($invoice->status === "PROGRESS")
                                          {{' btn-info  '}}
                                      @elseif($invoice->status === "COMPLETE")
                                          {{' btn-warning  '}}
                                      @elseif($invoice->status === "PAYMENT")
                                         {{' btn-success  '}}
                                      @elseif($invoice->status === "WITHDRAWAL")
                                         {{' btn-danger  '}}
                                    @endif

                                        ">
                                            {{__('input.'. $invoice->status)}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$invoice->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{route('invoice.edit',$invoice->id)}}">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $invoices->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
