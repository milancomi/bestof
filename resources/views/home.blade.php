@extends('layouts.app')

@section('content')
{{-- <div id="example"></div> --}}

<div id="app" data-user-id={!! Auth::user()->id !!} data-user-name={!!Auth::user()->name!!}></div>

{{-- ovde dodajem react componentu i dajem joj auth->user --}}

{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
