@extends('dashboard.master')


@section('title',  __('input.invoice_final'))
@section('content')
    <div class="row justify-content-sm-center">
        <div class="col-6">
            <div class="card rounded-2 row">
                <div class="card-body">

                    <div class="form-group row">
                        <label for="invoice_id"
                               class="col-sm-2 col-form-label">{{__('input.invoice_id')}}</label>

                        <div class="col-sm-6">
                            <input name="invoice_id" value="{{ old('input.invoice_id') }}"
                                   type="text" class="form-control"
                                   id="invoice_id"
                                   placeholder="{{__('input.invoice_id')}} {{__('input.placeholder')}}">
                        </div>


                        <div class="col-sm-2">
                            <a id="invoice_btn" class="btn btn-info  ">
                                <i class="mdi mdi-magnify"></i>
                            </a>
                        </div>
                        <div class="col-sm-2">
                            <a onclick="resetForm()" class="btn btn-info  ">
                                <i class="mdi mdi-close"></i>
                            </a>
                        </div>
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
                                <input name="price" value="{{ old('price') }}" type="text"
                                       class="form-control format-number"
                                       id="price"
                                       placeholder="{{__('input.price')}} {{__('input.placeholder')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="discount" class="col-sm-3 col-form-label"> {{__('input.discount')}}</label>
                            <div class="col-sm-9">
                                <input name="discount" value="{{ old('discount') }}" class="form-control format-number"
                                       id="discount"
                                       placeholder="{{__('input.discount')}} {{__('input.placeholder')}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="print_count"
                                   class="col-sm-3 col-form-label"> {{__('input.print_count')}}</label>
                            <div class="col-sm-9">
                                <input name="print_count" value="{{ old('print_count') }}"
                                       class="form-control format-number"
                                       id="print_count"
                                       placeholder="{{__('input.print_count')}} {{__('input.placeholder')}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="print_price"
                                   class="col-sm-3 col-form-label"> {{__('input.print_price')}}</label>
                            <div class="col-sm-9">
                                <input name="print_price" value="{{ old('print_price') }}"
                                       class="form-control format-number"
                                       id="print_price"
                                       placeholder="{{__('input.print_price')}} {{__('input.placeholder')}}">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="designer_id"
                                   class="col-sm-3 col-form-label">{{__('input.designer_name')}}</label>
                            <div class="col-sm-9">
                                <select name="designer_id" class="designer_id form-control "
                                        id="designer_id">
                                    <option value="0">-- انتخاب کنید --</option>
                                    @foreach($designers as $designer)
                                        <option value="{{$designer->id}}">{{$designer->name}} | کد
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

                        <div class="form-group  ">
                            <button type="submit" class="btn btn-info me-2"> {{__('input.submit')}}</button>
                            <button class="btn btn-light"> {{__('input.cancel')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let invoice = {}

        function resetForm() {
            $('#price').val('')
            $('#discount').val('')
            $('#print_count').val('')
            $('#print_price').val('')
            $('#customer_id').html('')
            $('#description').html('')
        }

        function fillForm(data) {
            const customer = data.customer;
            $('#price').val(new Intl.NumberFormat('en-IN', {maximumSignificantDigits: 3}).format(data.price))
            $('#discount').val(new Intl.NumberFormat('en-IN', {maximumSignificantDigits: 3}).format(data.discount))
            $('#print_count').val(new Intl.NumberFormat('en-IN', {maximumSignificantDigits: 3}).format(data.print_count))
            $('#print_price').val(new Intl.NumberFormat('en-IN', {maximumSignificantDigits: 3}).format(data.print_price))
            $('#customer_id').append('<option value="' + customer.id + '">' + customer.name + ' | ' + customer.mobile + ' | شماره موبایل' + '</option>')

            $('#designer_id option[value=' + data.designer.id + ']').attr('selected', 'selected');
            $('#description').html(data.description)
        }

        $(document).ready(function () {

            $('.format-number').mask('000,000,000,000,000', {reverse: true});

            $('.invoice_id').select2({dir: "rtl",});
            $('.customer_id').select2({dir: "rtl"});


            $("#invoice_btn").click(function () {
                const getInvoiceId = $('#invoice_id').val();


                $.ajax({
                    method: 'get',
                    url: "/search-invoice",
                    data: {search: getInvoiceId}
                }).done(function (data) {
                    resetForm()
                    if (data)
                        fillForm(data)
                });
            });

        });
    </script>
@endsection
