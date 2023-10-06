@extends('dashboard.master')


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
                                    باطل کردن
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
                                        @if($invoice->price)
                                            {{number_format($invoice->price)}} تومان
                                        @endif
                                    </td>
                                    <td>

                                        @if($invoice->print_count && $invoice->print_price)
                                            {{$invoice->print_count}} عدد
                                            | {{number_format($invoice->print_count * $invoice->print_price)}} تومان
                                        @else
                                            ندارد
                                        @endif
                                    </td>
                                    <td>
                                        @if($invoice->price && $invoice->print_count && $invoice->print_price && $invoice->discount)
                                            {{number_format($invoice->price - ($invoice->print_count * $invoice->print_price) - $invoice->discount)}}
                                            تومان
                                        @endif
                                    </td>
                                    <td>
                                        {{$invoice->designer->name}}
                                    </td>
                                    <td>
                                        {{$invoice->designer->commission}} %
                                    </td>
                                    <td>
                                        @if($invoice->price && $invoice->print_count && $invoice->print_price && $invoice->discount)

                                        {{number_format((($invoice->price - ($invoice->print_count * $invoice->print_price) - $invoice->discount) * $invoice->designer->commission)/ 100)}}
                                        @endif

                                    </td>

                                    <td>
                                        <a href="#" class="btn
                                        @if($invoice->status === "PROGRESS")
                                          {{' btn-success  '}}
                                      @elseif($invoice->status === "COMPLETE")
                                          {{' btn-warning '}}
                                      @elseif($invoice->status === "PAYMENT")
                                         {{' btn-info '}}
                                      @elseif($invoice->status === "WITHDRAWAL")
                                         {{' btn-danger '}}
                                    @endif">
                                            {{__('input.'. $invoice->status)}}
                                        </a>
                                    </td>
                                    <td>
                                        {{\Morilog\Jalali\CalendarUtils::strftime('H:i:s Y-m-d ', strtotime($invoice->created_at))}}
                                    </td>
                                    <td>
                                        <a href="">
                                            <i class="h2 text-danger mdi mdi-delete-circle-outline"></i>
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
