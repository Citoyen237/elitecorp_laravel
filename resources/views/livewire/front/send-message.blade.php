<div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="bg-light rounded p-5">
        <p class="d-inline-block border rounded-pill py-1 px-4">Contactez-nous</p>
        <h4 class="mb-4">Vous avez une question ? Contactez nous s'il vous plait!</h4>

        <div class="row g-3">
            <div class="col-12">
                <form wire:submit.prevent="submit">
                    <div class="form-floating">
                        <input type="email" class="form-control" wire:model='email'  name='email' id="" placeholder="votre adresse email">
                        @error('email') <span class="text-danger">*{{ $message }}</span> @enderror

                        <label for="email">
                            Votre email
                        </label>
                    </div>
            </div>
            <div class="col-12">
                <div class="">
                    <label for="message">Message:</label>
                    <textarea name="message" class="form-control"  wire:model.defer='message' id="" cols="30" rows="10"></textarea>
                    @error('message') <span class="text-danger">*{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary w-100 py-3"  type="submit">Envoyer le message</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- <script src="https://cdn.tiny.cloud/1/dinjailgf8gbayqx8wfb0eak8y5s598j8a6145agbt6cf55b/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    tinymce.init({
      selector: 'textarea'
    });
</script> --}}
