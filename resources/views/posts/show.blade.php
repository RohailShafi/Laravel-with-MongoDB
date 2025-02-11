@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Posts') }}</div>

                    <div class="card-body">

                      <table class="display-" style="width:100%">
                          <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
{{--                                <th> Added on </th>--}}
                            </tr>
                          </thead>

                          <tbody>
                          @foreach($posts as $post)
                            <tr>
                                <td>{{ $post['title'] }}</td>
                                <td>{{ $post['description'] }}</td>
                                <td>{{ $post['status'] }}</td>
{{--                                <td> {{ $post['created_at'] }}}</td>--}}
                            </tr>
                          @endforeach
                          </tbody>
                      </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
