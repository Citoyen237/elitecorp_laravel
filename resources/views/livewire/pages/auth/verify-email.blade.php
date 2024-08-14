<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    /**
     * Send an email verification notification to the user.
     */
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('indexF', absolute: false), navigate: true);

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div>
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
                            <h1 class="text-center">Verifier votre adresse email</h1>

                            <h6 class="text-center text-warning">Merci pour l'enregistrement! Avant de commencer,
                                pourriez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de
                                vous envoyer par e-mail ? Si vous n'avez pas reçu l'e-mail, nous vous en enverrons
                                volontiers un autre.</h6>
                            @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de
                                inscription
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                                <div class="input mb-3">
                                    <h6 for="email">EMAIL</h6>
                                    <input type="email" wire:model="email" name="email" id="email" class="form-control"
                                        placeholder="email">
                                    @error('email') <span class="text-danger">*{{ $message }}</span> @enderror

                                </div>
                                <div class="input mb-3">
                                    <button wire:click='sendVerification' class="btn btn-primary form-control text-dark">Verifier</button>
                                </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __("
        Merci pour l'enregistrement! Avant de commencer, pourriez-vous vérifier votre adresse e-mail en cliquant sur le
        lien que nous venons de vous envoyer par e-mail ? Si vous n'avez pas reçu l'e-mail, nous vous en enverrons
        volontiers un autre.
        ") }}
    </div>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
    </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <x-primary-button wire:click="sendVerification">
            {{ __('Resend Verification Email') }}
        </x-primary-button>

        <button wire:click="logout" type="submit"
            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
            {{ __('Log Out') }}
        </button>
    </div> --}}
</div>
