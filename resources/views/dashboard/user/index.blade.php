@extends('dashboard.master')
@section('btn')
    <a class="btn btn-success"
       href="{{route('user.create')}}">   {{__('label.store', ['params' => __('input.design')])}} </a>
@endsection


@section('title','لیست کاربران  ')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"> لیست کاربران</h4>

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
                                    <td>
                                        {{$user->commission}} %
                                    </td>
                                    <td>
                                        {{$user->created_at}}
                                    </td>
                                    <td>
                                        <a href="{{route('user.edit',$user->id)}}">
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
