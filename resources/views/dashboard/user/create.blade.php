@extends('dashboard.master')


@section('title',' طراح جدید ')
@section('content')
    <div class="row">
        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> ساخت طراح جدید </h4>

                    <form method="POST" action="{{ route('user.store') }}" class="forms-sample">

                        @csrf

                        <div class="form-group row">
                            <label for="designer_name" class="col-sm-3 col-form-label">
                                {{__('input.designer_name')}}
                            </label>
                            <div class="col-sm-9">
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control"
                                       id="designer_name"
                                       placeholder="{{__('input.designer_name')}} {{__('input.placeholder')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-sm-3 col-form-label"> {{__('input.mobile')}}</label>
                            <div class="col-sm-9">
                                <input name="mobile" value="{{ old('mobile') }}" class="form-control" id="mobile"
                                       placeholder="{{__('input.mobile')}} {{__('input.placeholder')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">{{__('input.password')}}</label>
                            <div class="col-sm-9">
                                <input name="password" value="{{ old('password') }}" type="password"
                                       class="form-control" id="password"
                                       placeholder="{{__('input.password')}} {{__('input.placeholder')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="commission" class="col-sm-3 col-form-label">{{__('input.commission')}}</label>
                            <div class="col-sm-9">
                                <input name="commission" value="{{ old('commission') }}" type="number"
                                       class="form-control" id="commission"
                                       placeholder="{{__('input.commission')}} {{__('input.placeholder')}}">
                            </div>
                        </div>
                        <input name="type" value="OPERATOR" type="hidden">


                        <button type="submit" class="btn btn-primary me-2"> {{__('input.submit')}}</button>
                        <button class="btn btn-light"> {{__('input.cancel')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
