<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('indexF', absolute: false), navigate: true);
    }
}; ?>

<div>
    {{--
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password"
                name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('password.request') }}" wire:navigate>
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}

    <div class="container  my-5 px-lg-0">
        <div class="container px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('front/img/draw1.jpg')}}"
                            style="object-fit: cover;" alt="">
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="mb-2">
                        <div class="card-body">
                            <h1 class="text-center">Se connecter</h1>
                            @error('form.email') <span class="text-danger">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $message }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @enderror
                                <form wire:submit="login">
                                    <div class="input mb-3">
                                        <h6 for="email">EMAIL</h6>
                                        <input type="email" name="email" id="email" wire:model="form.email"
                                            class="form-control" placeholder="email">
                                    </div>
                                    <div class="input mb-3">
                                        <h6 for="email">MOT DE PASSE</h6>
                                        <input type="password" name="password" wire:model="form.password"
                                            class="form-control" placeholder="mot de passe">
                                        @error('form.password') <span class="text-danger">*{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input mb-3">
                                        <button class="btn btn-primary form-control text-dark">Connexion</button>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
                                        <!-- Checkbox -->
                                        <div class="form-check mb-0">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example3" />
                                            <label class="form-check-label" for="form2Example3">
                                                Se souvenir de moi
                                            </label>
                                        </div>
                                        <a href="{{ route('password.request') }}" class="">Mot de passe oublie ?</a>
                                    </div>
                                    <br>
                                    <div class="input mb-3">
                                        <p class="mt-2 text-center">Vous n'avez pas de compte? <a
                                                href="{{ route('register')}}">Creer le compte</a>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
