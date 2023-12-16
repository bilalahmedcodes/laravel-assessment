@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('List of All Clients') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        {{-- {{ __('You are logged in!') }} --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Client Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($clients) > 0)
                                    @foreach ($clients as $key => $client)
                                        <tr>
                                            <td>{{ $clients->firstItem() + $key }}</td>
                                            <td>{{ $client->name ?? '' }}</td>
                                            @if (in_array(Auth::user()->roles[0]->name, ['Admin']))
                                                <td>
                                                    <a href="{{ route('set-prices', $client) }}"
                                                        class="btn btn-primary">
                                                        Set Price
                                                    </a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3" class="text-center">No record found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        @if ($clients->total() > 10)
                            {{ $clients->appends(request()->input())->links('vendor.pagination.bootstrap-5') }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->

@endsection
