<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Mount the component.
     */
    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }

    /**
     * Reset the password for the given user.
     */
    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));

            return;
        }

        Session::flash('status', __($status));

        $this->redirectRoute('login', navigate: true);
    }
}; ?>

<div>
    <form wire:submit="resetPassword">
        <div class="container  my-5 px-lg-0">
            <div class="container px-lg-0">
                <div class="row g-0 mx-lg-0">
                    <div class="col-lg-6 pe-lg-0 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute img-fluid w-100 h-100" src="{{ asset('front/img/draw1.jpg')}}"
                                style="object-fit: cover;" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-2">
                            <div class="card-body">
                                <h1 class="text-center">Definissez un nouveau mots de passe</h1>
                                    <div class="input mb-3">
                                        <h6 for="email">EMAIL</h6>
                                        <input type="email" wire:model="email" name="email" class="form-control"  readonly placeholder="email" required autofocus autocomplete="username">
                                        @error('email') <span class="text-danger">*{{ $message }}</span> @enderror
                                    </div>

                                    <div class="input mb-3">
                                        <h6 for="email">MOT DE PASSE</h6>
                                        <input type="password" wire:model="password" name="password" class="form-control"
                                            placeholder="mot de passe">
                                            @error('password') <span class="text-danger">*{{ $message }}</span> @enderror
                                    </div>
                                    <div class="input mb-3">
                                        <h6 for="email">CONFIRMER LE MOT DE PASSE</h6>
                                        <input type="password" wire:model="password_confirmation" name="password_confirmation" class="form-control"
                                            placeholder="comfirmez le mot de passe">
                                            @error('password_confirmation') <span class="text-danger">*{{ $message }}</span> @enderror
                                    </div>
                                    <div class="input mb-3">
                                        <button class="btn btn-success form-control text-dark">Mettre a jour</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Email Address -->
        {{-- <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> --}}

        <!-- Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> --}}

        <!-- Confirm Password -->
        {{-- <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div> --}}
    </form>
</div>
