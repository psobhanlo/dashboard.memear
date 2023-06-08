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
                                    {{__('input.name')}}
                                </th>
                                <th>
                                    {{__('input.mobile')}}
                                </th>
                                <th>
                                    {{__('input.commission')}}
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
                                        {{$invoice->name}}
                                    </td>
                                    <td>
                                        {{$invoice->mobile}}
                                    </td>
                                    <td>
                                        {{$invoice->commission}} %
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
