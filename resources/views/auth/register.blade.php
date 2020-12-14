@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Créer un compte') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- Nom --}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- E-mail --}}
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Adresse mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Mdp --}}
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Confirmer mdp --}}
                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            {{-- Age --}}
                            <div class="form-group row">
                                <label for="age" class="col-md-4 col-form-label text-md-right">Age</label>

                                <div class="col-md-6">
                                    <input id="age" type="number" value="{{ old('age') }}"
                                        class="form-control @error('age') is-invalid @enderror" name="age" required>
                                    @error('age')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Adresse --}}
                            <div class="form-group row">
                                <label for="adresse"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

                                <div class="col-md-6">
                                    <input id="adresse" type="text"
                                        class="form-control @error('adresse') is-invalid @enderror"
                                        value="{{ old('adresse') }}" name="adresse" required>
                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- tel_mobile --}}
                            <div class="form-group row">
                                <label for="tel_mobile"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Téléphone portable') }}</label>
                                <div class="col-md-6">
                                    <input id="tel_mobile" type="number"
                                        class="form-control @error('tel_mobile') is-invalid @enderror"
                                        value="{{ old('tel_mobile') }}" name="tel_mobile" required>
                                    @error('tel_mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- tel_fixe --}}
                            <div class="form-group row">
                                <label for="tel_fixe"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Téléphone fixe') }}</label>
                                <div class="col-md-6">
                                    <input id="tel_fixe" type="number"
                                        class="form-control @error('tel_fixe') is-invalid @enderror"
                                        value="{{ old('tel_fixe') }}" name="tel_fixe" required>
                                    @error('tel_fixe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- sport_pref --}}
                            <div class="form-group row">
                                <label for="sport_pref"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Sport préféré') }}</label>
                                <div class="col-md-6">
                                    <select name="sport_pref" id="sport_pref"
                                        class="form-control @error('sport_pref') is-invalid @enderror"
                                        value="{{ old('sport_pref') }}">
                                        <option value="foot">Foot</option>
                                        <option value="rugby">Rugby</option>
                                        <option value="handball">Handball</option>
                                        <option value="basket">Basket</option>
                                        <option value="athletisme">Athlétisme</option>
                                        <option value="natation">Natation</option>
                                        <option value="escrime">Escrime</option>
                                    </select>
                                    @error('sport_pref')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- montant_max --}}
                            <div class="form-group row">
                                <label for="montant_max"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Montant max') }}</label>
                                <div class="col-md-6">
                                    <input id="montant_max" type="number"
                                        class="form-control @error('montant_max') is-invalid @enderror"
                                        value="{{ old('montant_max') }}" name="montant_max" required>
                                    @error('montant_max')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Est un admin --}}
                            <input type="hidden" name="admin" value="0">

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Créer un compte') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
