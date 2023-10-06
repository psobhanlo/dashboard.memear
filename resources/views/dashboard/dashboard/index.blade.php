@extends('dashboard.master')

@section('title','داشبورد  ')
@section('content')
    <div class="row justify-content-sm-center">
        <div class="col-md-5 col-12 grid-margin stretch-card">
            <div class="card rounded-2 row">
                <h4 class="py-2">کاربران</h4>

                <div class="row my-3">
                    <div class="col">
                        <a href="{{route('user.index' , ['type'=>'USER'])}}" class="btn btn-primary w-100 text-white">لیست
                            مشتری ها</a>
                    </div>
                    <div class="col">
                        <a href="{{route('user.create',['type'=>'USER'])}}" class="btn btn-primary w-100 text-white">
                            مشتری جدید</a>
                    </div>
                </div>


                <div class="row my-3">
                    <div class="col">
                        <a href="{{route('user.index' , ['type'=>'OPERATOR'])}}"
                           class="btn btn-primary w-100 text-white">لیست
                            طراح ها</a>
                    </div>

                    <div class="col">
                        <a href="{{route('user.create',['type'=>'OPERATOR'])}}"
                           class="btn btn-primary w-100 text-white">
                            طراح جدید</a>
                    </div>
                </div>
                <h4 class="py-2">فاکتور</h4>

                <div class="row my-3">
                    <div class="col">
                        <a href="{{route('invoice.create')}}"
                           class="btn btn-primary w-100 text-white">ساخت قبض
                        </a>
                    </div>

                    <div class="col">
                        <a href="{{route('invoice.index',['status'=>'PROGRESS'])}}"
                           class="btn btn-primary w-100 text-white">
                            فاکتور باز</a>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col-6">
                        <a href="{{route('invoice.search')}}"
                           class="btn btn-warning w-100 text-white">تسویه قبض
                        </a>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="col">
                        <a href="{{route('invoice.index',['status'=>'COMPLETE'])}}"
                           class="btn btn-primary w-100 text-white">
                            تسویه شده با مشتری </a>
                    </div>

                    <div class="col">
                        <a href="{{route('invoice.index',['status'=>'PAYMENT'])}}"
                           class="btn btn-primary w-100 text-white">
                            کارروز
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
