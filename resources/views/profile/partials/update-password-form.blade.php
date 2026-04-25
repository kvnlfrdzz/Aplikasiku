<section>

    <div class="card shadow-sm mt-4">
        <div class="card-body">

            <h4 class="mb-3">Update Password</h4>
            <p class="text-muted mb-4">
                Gunakan password yang kuat untuk menjaga keamanan akun.
            </p>

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                {{-- CURRENT PASSWORD --}}
                <div class="form-group mb-3">
                    <label>Password Lama</label>
                    <input type="password" name="current_password" class="form-control">

                    @if ($errors->updatePassword->get('current_password'))
                        <div class="text-danger mt-1">
                            {{ $errors->updatePassword->first('current_password') }}
                        </div>
                    @endif
                </div>

                {{-- NEW PASSWORD --}}
                <div class="form-group mb-3">
                    <label>Password Baru</label>
                    <input type="password" name="password" class="form-control">

                    @if ($errors->updatePassword->get('password'))
                        <div class="text-danger mt-1">
                            {{ $errors->updatePassword->first('password') }}
                        </div>
                    @endif
                </div>

                {{-- CONFIRM PASSWORD --}}
                <div class="form-group mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                {{-- BUTTON --}}
                <button class="btn btn-primary">
                    🔒 Update Password
                </button>

                {{-- SUCCESS --}}
                @if (session('status') === 'password-updated')
                    <div class="alert alert-success mt-3">
                        Password berhasil diupdate!
                    </div>
                @endif

            </form>

        </div>
    </div>

</section>