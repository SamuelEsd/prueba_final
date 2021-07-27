@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Data') }}</div>

                <div class="card-body">
                    {{-- <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"> {{-- enctype added --}} 
                        {{-- @csrf --}}

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Name') }}:</label>

                            <div class="col-md-6">
                                
                                <label class="col-md-10 col-form-label text-md-left">{{ $user->name }}</label>
                                {{-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> --}}

                                {{-- @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}:</label>

                            <div class="col-md-6">
                                <label class="col-md-10 col-form-label text-md-left">{{ $user->email }}</label>                                
                                {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>
                        
                        {{-- Empieza alteración se agrega telefono--}}
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}:</label>

                            <div class="col-md-6">
                                <label class="col-md-10 col-form-label text-md-left">{{ $user->phone_number }}</label>
                                {{-- <input id="phone_number" type="tel" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" class="form-control" placeholder="01-2345-6789"
                                @error('phone_number') is-invalid 
                                @enderror name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number">
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}:</label>

                            <div class="col-md-6">
                                <img src="{{ asset('images/users/' . $user->photo)}}">
                                
                                {{-- <label class="col-md-10 col-form-label text-md-left">{{ $user->photo }}</label> --}}
                                {{-- <input id="photo" type="file"  class="form-control" accept="image/png, image/jpeg"
                                @error('photo') is-invalid 
                                @enderror name="photo" value="{{ old('photo') }}" required autocomplete="photo">

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{ __('Genres') }}:</label>

                            <div class="col-md-6">
                                <label class="col-md-10 col-form-label text-md-left">Generos listar</label>

                                @forelse ($user->genres as $genre)
                                    <li>{{ $genre->name }}</li>
                                @empty
                                    <p>No genres</p>
                                @endforelse

                                <div id="app">
                                    <list-tags />
                                </div>
                                

                                {{-- <input id="photo" type="file"  class="form-control" accept="image/png, image/jpeg"
                                @error('photo') is-invalid 
                                @enderror name="photo" value="{{ old('photo') }}" required autocomplete="photo">

                                @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        {{-- Termina alteracion --}}
                        {{-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        {{-- <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection