@extends('dashboard.master')


@section('title',  __('label.update', ['params' => __('input.invoice')]))
@section('content')
    <div class="row">
        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">  {{__('label.update', ['params' => __('input.invoice')])}} </h4>

                    <form method="POST" action="{{ route('invoice.update', $invoice->id) }}" class="forms-sample">

                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">
                                {{__('input.price')}}
                            </label>
                            <div class="col-sm-9">
                                <input name="price" value="{{$invoice->price }}" type="text" class="form-control"
                                       id="price"
                                       placeholder="{{__('input.price')}} {{__('input.placeholder')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="discount" class="col-sm-3 col-form-label"> {{__('input.discount')}}</label>
                            <div class="col-sm-9">
                                <input name="discount" value="{{$invoice->discount }}" class="form-control"
                                       id="discount"
                                       placeholder="{{__('input.discount')}} {{__('input.placeholder')}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="print_count"
                                   class="col-sm-3 col-form-label"> {{__('input.print_count')}}</label>
                            <div class="col-sm-9">
                                <input name="print_count" value="{{$invoice->print_count }}" class="form-control"
                                       id="print_count"
                                       placeholder="{{__('input.print_count')}} {{__('input.placeholder')}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="print_price"
                                   class="col-sm-3 col-form-label"> {{__('input.print_price')}}</label>
                            <div class="col-sm-9">
                                <input name="print_price" value="{{$invoice->print_price }}" class="form-control"
                                       id="print_price"
                                       placeholder="{{__('input.print_price')}} {{__('input.placeholder')}}">
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="designer_id"
                                   class="col-sm-3 col-form-label">{{__('input.designer_name')}}</label>
                            <div class="col-sm-9">
                                <select name="designer_id" class="designer_id form-control form-control-lg"
                                        id="designer_id">
                                    @foreach($designers as $designer)
                                        <option @if($invoice->designer_id == $designer->id) selected
                                                @endif value="{{$designer->id}}">{{$designer->name}} | کد
                                            طراح {{$designer->id}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="customer_id"
                                   class="col-sm-3 col-form-label">{{__('input.customer_name')}}</label>
                            <div class="col-sm-9">
                                <select name="customer_id" class="customer_id form-control form-control-lg"
                                        id="customer_id">
                                    <option value="{{$invoice->customer->id}}">{{$invoice->customer->name}} |
                                        {{$invoice->customer->mobile}} شماره اشتراک
                                        | {{$invoice->customer->id}}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status"
                                   class="col-sm-3 col-form-label">{{__('input.status')}}</label>
                            <div class="col-sm-9">
                                <select name="status" class="status form-control form-control-lg"
                                        id="status">
                                    <option @if($invoice->status =='PROGRESS') selected
                                            @endif value="PROGRESS"> {{__('input.PROGRESS')}} </option>
                                    <option @if($invoice->status =='COMPLETE') selected
                                            @endif value="COMPLETE"> {{__('input.COMPLETE')}} </option>
                                    <option @if($invoice->status =='PAYMENT') selected
                                            @endif value="PAYMENT"> {{__('input.PAYMENT')}} </option>
                                    <option @if($invoice->status =='WITHDRAWAL') selected
                                            @endif value="WITHDRAWAL"> {{__('input.WITHDRAWAL')}} </option>


                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 col-form-label">{{__('input.description')}}</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" id="description"
                                          rows="4">{{$invoice->description }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary me-2"> {{__('input.submit')}}</button>
                        <button class="btn btn-light"> {{__('input.cancel')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('.designer_id').select2({dir: "rtl"});
            $('.customer_id').select2({dir: "rtl"});


            $(document).on('keyup', '.select2-search__field', function (e) {
                $.ajax({
                    url: "/search-customer?type=USER",
                    data: {search: e.target.value}
                }).done(function (data) {
                    console.log(data)
                    $('#customer_id').html('')
                    $.map(data, function (val, i) {
                        $('#customer_id').append('<option value="' + val.id + '">' + val.name + ' | ' + val.mobile + ' | شماره اشتراک' + val.id + '</option>')
                    });
                });
            });

            // $('.customer_id').select2({
            //     dir: "rtl",
            //     ajax: {
            //         delay: 250,
            //         dataType: 'json',
            //         url: '/search-customer?type=USER',
            //         data: function (params) {
            //             return {
            //                 search: params.term,
            //             };
            //         },
            //         processResults: function (data) {
            //             var arr = []
            //             console.log(data)
            //             $.each(data, function (index, item) {
            //                 arr.push({
            //                     id: item.id,
            //                     text: item.name + ' | اشتراک شماره ' + item.id + ' | همراه شماره ' + item.mobile,
            //                 })
            //             })
            //
            //             return {
            //                 results: arr
            //             };
            //         }
            //     },
            //
            // })
        });
    </script>
@endsection
