@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        {{--<div class="row justify-content-center mb-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(Auth::check())
                            You are logged in!
                        @else
                            Home!
                        @endif
                    </div>
                </div>
            </div>
        </div>--}}
        @foreach($products as $key => $product)

            @if($key === 0)
                <div class="row mb-3">
            @elseif($key % 3 === 0)
                </div> <div class="row mb-3">
            @endif

            <div class="col-4">
                @component('components.card')
                    @slot('src') {{ $product->image_source }} @endslot
                    @slot('title') {{ $product->name }} @endslot
                    @slot('description') {{ $product->price }} @endslot
                    <button class="btn btn-primary">Show details <i class="fas fa-address-book"></i></button>
                @endcomponent
            </div>

        @endforeach
    </div>
    </div>
@endsection
