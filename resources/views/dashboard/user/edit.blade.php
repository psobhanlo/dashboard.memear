@extends('dashboard.master')


@section('title',  request()->get('type') =='USER'? 'ویرایش مشتری ':'ویرایش طراح ')
@section('content')
    <div class="row">
        <div class="grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        @if(request()->get('type') =='USER')
                            ویرایش مشتری
                        @else
                            ویرایش طراح
                        @endif
                    </h4>

                    <form method="POST" action="{{ route('user.update',$user->id) }}" class="forms-sample">

                        @csrf
                        {{ method_field('PUT') }}

                        <div class="form-group row">
                            <label for="desginer_name" class="col-sm-3 col-form-label">
                                {{__('input.name')}}
                            </label>
                            <div class="col-sm-9">
                                <input name="name" value="{{$user->name }}" type="text" class="form-control"
                                       id="designer_name"
                                       placeholder="{{__('input.name')}} {{__('input.placeholder')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-sm-3 col-form-label"> {{__('input.mobile')}}</label>
                            <div class="col-sm-9">
                                <input name="mobile" value="{{ $user->mobile }}" class="form-control" id="mobile"
                                       placeholder="{{__('input.mobile')}} {{__('input.placeholder')}}">
                            </div>
                        </div>

                        @if($user->type =='OPERATOR')

                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">{{__('input.password')}}</label>
                                <div class="col-sm-9">
                                    <input name="password" type="password" class="form-control" id="password"
                                           placeholder="{{__('input.password')}} {{__('input.placeholder')}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="commission"
                                       class="col-sm-3 col-form-label">{{__('input.commission')}}</label>
                                <div class="col-sm-9">
                                    <input name="commission" value="{{$user->commission}}" type="number"
                                           class="form-control" id="commission"
                                           placeholder="{{__('input.commission')}} {{__('input.placeholder')}}">
                                </div>
                            </div>
                        @endif
                        <input name="type" value="{{$user->type}}" type="hidden">


                        <button type="submit" class="btn btn-info me-2"> {{__('input.submit')}}</button>
                        <button class="btn btn-light"> {{__('input.cancel')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
