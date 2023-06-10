@extends('dashboard.master')
@section('btn')
    <a class="btn btn-success"
       href="{{route('user.create',['type' => request()->get('type')])}}">
        @if(request()->get('type') =='USER')
            {{__('label.store', ['params' => __('label.customers')])}}
        @else
            {{__('label.store', ['params' => __('label.designers')])}}
        @endif
    </a>
@endsection


@section('title',  request()->get('type') =='USER'? ' مشتری ها':'  طراح ها')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">

                        @if(request()->get('type') == 'USER')
                            مشتری ها
                        @else
                            طراح ها
                        @endif

                    </h4>

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
                                @if(request()->get('type') =='OPERATOR')
                                    <th>
                                        {{__('input.commission')}}
                                    </th>
                                @endif
                                <th>
                                    {{__('input.created_at')}}
                                </th>
                                <th>
                                    {{__('input.edit')}}
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="py-1">
                                        {{$user->id}}
                                    </td>

                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->mobile}}
                                    </td>
                                    @if(request()->get('type') =='OPERATOR')
                                        <td>
                                            {{$user->commission}} %
                                        </td>
                                    @endif
                                    <td>
                                        {{$user->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{route('user.edit',$user->id )}}">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    {{ $users->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection
