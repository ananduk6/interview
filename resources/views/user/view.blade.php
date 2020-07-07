@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('User') }}</div>

                <div class="card-body">

                    <table class="table table-bordered table-striped table-responsive">
                        <tr>
                            <td>name</td>
                            <td>email</td>
                            <td>Verified</td>
                            <td>subscription</td>

                        </tr>
                        <tr>
                            <td>
                                {{ $users->name }}
                            </td>
                            <td>{{$users->email}}</td>
                            <td>
                                @if($users->email_verified_at != '')
                                <a href="javascript:void(0);" class="label label-success">Verfied</a>
                                @else
                                <a href="javascript:void(0);" class="label label-success">Not Verfied</a>
                                @endif
                            </td>
                            <td>{{$users->subscription}}</td>
                        </tr>

                    </table>

                    <table class="table table-bordered table-striped table-responsive">



                        @if(count($subDatas) > 0)

                        <tr>
                            <td>story title</td>
                            <td>title</td>
                            <td>comment text</td>
                        </tr>
                        @foreach($subDatas as $data)
                        <tr>
                            <td>
                                {{ $data['story_title'] }}
                            </td>
                            <td>{{$data['title']}}</td>
                            <td>{{$data['comment_text']}}</td>
                            
                        </tr>
                        @endforeach

                        @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection