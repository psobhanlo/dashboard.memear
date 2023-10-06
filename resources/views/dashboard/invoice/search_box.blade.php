@extends('dashboard.master')


@section('title',  __('input.invoice_final'))
@section('content')
    <div class="row justify-content-sm-center">
        <div class="col-6">
            <div class="card rounded-2 row">
                <div class="card-body">

                    <div class="form-group row">
                        <label for="invoice_id"
                               class="col-sm-3 col-form-label">{{__('input.invoice_id')}}</label>
                        <div class="col-sm-9">
                            <input name="invoice_id" value="{{ old('input.invoice_id') }}"
                                   type="text" class="form-control"
                                   id="invoice_id"
                                   placeholder="{{__('input.invoice_id')}} {{__('input.placeholder')}}">
                        </div>
                    </div>

                    <div class="form-group  ">
                        <button class="btn btn-info float-end"> {{__('input.search')}}</button>
                    </div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">  {{__('label.store', ['params' => __('input.invoice')])}} </h4>

                    <form method="POST" action="{{ route('invoice.store') }}" class="forms-sample">

                        @csrf

                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">
                                {{__('input.price')}}
                            </label>
                            <div class="col-sm-9">
                                <input name="price" value="{{ old('price') }}" type="text" class="form-control"
                                       id="price"
                                       placeholder="{{__('input.price')}} {{__('input.placeholder')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="discount" class="col-sm-3 col-form-label"> {{__('input.discount')}}</label>
                            <div class="col-sm-9">
                                <input name="discount" value="{{ old('discount') }}" class="form-control"
                                       id="discount"
                                       placeholder="{{__('input.discount')}} {{__('input.placeholder')}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="print_count"
                                   class="col-sm-3 col-form-label"> {{__('input.print_count')}}</label>
                            <div class="col-sm-9">
                                <input name="print_count" value="{{ old('print_count') }}" class="form-control"
                                       id="print_count"
                                       placeholder="{{__('input.print_count')}} {{__('input.placeholder')}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="print_price"
                                   class="col-sm-3 col-form-label"> {{__('input.print_price')}}</label>
                            <div class="col-sm-9">
                                <input name="print_price" value="{{ old('print_price') }}" class="form-control"
                                       id="print_price"
                                       placeholder="{{__('input.print_price')}} {{__('input.placeholder')}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="customer_id"
                                   class="col-sm-3 col-form-label">{{__('input.customer_name')}}</label>
                            <div class="col-sm-9">
                                <select name="customer_id" class="customer_id form-control form-control-lg"
                                        id="customer_id">

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description"
                                   class="col-sm-3 col-form-label">{{__('input.description')}}</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" id="description"
                                          rows="4">{{ old('description') }}</textarea>
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
            $('.invoice_id').select2({dir: "rtl",});

            $('.customer_id').select2({dir: "rtl"});

            $(document).on('keyup', '.select2-search__field', function (e) {
                console.log(e)
                $.ajax({
                    method: 'get',
                    url: "/search-invoice",
                    data: {search: e.target.value}
                }).done(function (data) {
                    console.log(data)
                    $('#invoice_id').html('')
                    $.map(data, function (val, i) {

                        $('#invoice_id').append('<option value="' + val.id + '">' + val.name + ' | ' + val.mobile + ' | شماره اشتراک' + val.id + '</option>')
                    });
                });
            });
        });
    </script>
@endsection
