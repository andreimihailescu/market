@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-4">
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
        </div>
        <div class="row mb-1">
            <div class="col-12">
                @component('components.card')
                    @slot('title')
                        This is the title
                    @endslot
                    This is the body
                    @slot('src')

                        @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection
