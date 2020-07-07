@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User') }}</div>

                <div class="card-body">

                @if($users->count() > 0)
                <p>{{$users->total()}} total users found</p>
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>name</td>
                        <td>email</td>
                        <td>subscription</td>
                        <td>Verified</td>
                        <td>actions</td>
                    </tr>

                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->subscription}}</td>
                            <td> 
                                @if($user->email_verified_at != '')
                                    <a href="javascript:void(0);" class="label label-success">Verfied</a>
                                @else
                                <a href="javascript:void(0);" class="label label-success">Not Verfied</a>

                                @endif
                            </td>
                            <td>
                                <a href="{{ URL::to('user/' . $user->id) }}" class="btn btn-secondary btn-sm">View</a>
                               <a href="{{ URL::to('user/' . $user->id . '/edit') }}" class="btn btn-info btn-sm">Edit </a>
                            </td>
                        </tr>
                    @endforeach

                   @endif


                


                {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
