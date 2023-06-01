@extends('dashboard.master')
 
 
@section('title',' طراح  ویرایش ')
@section('content')
        <div class="row">
            <div class="grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> ویرایش طراح    </h4>
 
                  <form method="POST" action="{{ route('user.update',$user->id) }}" class="forms-sample" >
                      
                     @csrf
                {{ method_field('PUT') }}

                    <div class="form-group row">
                      <label for="desginer_name" class="col-sm-3 col-form-label">
                          {{__('input.desginer_name')}}
                      </label>
                      <div class="col-sm-9">
                        <input name="name" value="{{$user->name }}" type="text" class="form-control" id="desginer_name" placeholder="{{__('input.desginer_name')}} {{__('input.placeholder')}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="mobile" class="col-sm-3 col-form-label"> {{__('input.mobile')}}</label>
                      <div class="col-sm-9">
                        <input name="mobile"  value="{{ $user->mobile }}" class="form-control" id="mobile" placeholder="{{__('input.mobile')}} {{__('input.placeholder')}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="password" class="col-sm-3 col-form-label">{{__('input.password')}}</label>
                      <div class="col-sm-9">
                        <input name="password"   type="password" class="form-control" id="password" placeholder="{{__('input.password')}} {{__('input.placeholder')}}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="commission"  class="col-sm-3 col-form-label">{{__('input.commission')}}</label>
                      <div class="col-sm-9">
                        <input name="commission" value="{{$user->commission}}"  type="number" class="form-control" id="commission" placeholder="{{__('input.commission')}} {{__('input.placeholder')}}">
                      </div>
                    </div>
                          <input name="type" value="OPERATOR" type="hidden"   >

 
                    <button type="submit" class="btn btn-primary me-2"> {{__('input.submit')}}</button>
                    <button class="btn btn-light"> {{__('input.cancel')}}</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
@endsection