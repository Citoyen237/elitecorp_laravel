<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name= '';
    public string $prenom = '';
    public string $telephone = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'prenom'=>['required', 'string', 'max:255'],
            'telephone'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $this->name,
            'prenom'=>$this->prenom,
            'email' => $this->email,
            'telephone' => $this->telephone,
            'password' => Hash::make($this->password),
        ]);
        event(new Registered($user));
        // $validated['password'] = Hash::make($validated['password']);

        // event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('verification.notice', absolute: false), navigate: true);
    }
}; ?>

<div>

    {{--
    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus
            autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required
            autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Password')" />

        <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
            required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

        <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
            type="password" name="password_confirmation" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
            href="{{ route('login') }}" wire:navigate>
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="ms-4">
            {{ __('Register') }}
        </x-primary-button>
    </div> --}}
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
                            <h1 class="text-center">Creer un compte</h1>
                            <form wire:submit="register">
                                <div class="input mb-3">
                                    <h6 for="nom">NOM</h6>
                                    <input type="text" wire:model="name" name="name" class="form-control" placeholder="nom">
                                    @error('name') <span class="text-danger">*{{ $message }}</span> @enderror
                                </div>
                                <div class="input mb-3">
                                    <h6 for="prenom">PRENOM</h6>
                                    <input type="text" wire:model="prenom" name="prenom" class="form-control" placeholder="prenom">
                                    @error('prenom') <span class="text-danger">*{{ $message }}</span> @enderror
                                </div>
                                <div class="input mb-3">
                                    <h6 for="email">EMAIL</h6>
                                    <input type="email" wire:model="email" name="email" class="form-control" placeholder="email">
                                    @error('email') <span class="text-danger">*{{ $message }}</span> @enderror
                                </div>
                                <div class="input mb-3">
                                    <h6 for="email">NUMERO DE TELEPHONE</h6>
                                    <input type="text" wire:model="telephone" name="telephone" class="form-control"
                                        placeholder="telephone">
                                        @error('telephone') <span class="text-danger">*{{ $message }}</span> @enderror
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
                                    <button class="btn btn-primary form-control text-dark">Enregistrer</button>
                                </div>
                                <br>
                                <div class="input mb-3">
                                    <p class="mt-2 text-center">Vous déjà un compte? <a href="{{route('login')}}">Connectez-vous</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
