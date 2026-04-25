<section class="mt-4">

    <div class="card shadow-sm border-danger">
        <div class="card-body">

            <h4 class="text-danger mb-3">Delete Account</h4>

            <p class="text-muted">
                Akun yang dihapus tidak bisa dikembalikan. Pastikan Anda yakin.
            </p>

            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div class="form-group mb-3">
                    <label>Masukkan Password untuk konfirmasi</label>
                    <input type="password" name="password" class="form-control">
                    
                    @if ($errors->userDeletion->get('password'))
                        <div class="text-danger mt-1">
                            {{ $errors->userDeletion->first('password') }}
                        </div>
                    @endif
                </div>

                <button class="btn btn-danger">
                    🗑️ Delete Account
                </button>

            </form>

        </div>
    </div>

</section>