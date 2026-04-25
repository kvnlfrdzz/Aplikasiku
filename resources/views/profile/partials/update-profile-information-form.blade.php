<section>

    <div class="card shadow-sm">
        <div class="card-body">

            <h4 class="mb-3">Profile Information</h4>
            <p class="text-muted mb-4">
                Update your account's profile information and email address.
            </p>

            {{-- FORM VERIFICATION --}}
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            {{-- FORM UPDATE --}}
            <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <div>
    <label class="form-label">Foto Profil</label>

    {{-- preview --}}
    @if ($user->photo)
        <div class="mb-2">
            <img src="{{ asset('storage/profile/'.$user->photo) }}" 
                 width="100" 
                 style="border-radius:50%;">
        </div>
    @endif

    <input type="file" name="photo" class="form-control">
</div>

                {{-- NAME --}}
                <div class="form-group mb-3">
                    <label>Nama</label>
                    <input 
                        type="text" 
                        name="name" 
                        value="{{ old('name', $user->name) }}"
                        class="form-control"
                        required
                    >

                    @error('name')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        value="{{ old('email', $user->email) }}"
                        class="form-control"
                        required
                    >

                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- VERIFICATION --}}
                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="alert alert-warning">
                        Email belum diverifikasi.

                        <button form="send-verification" class="btn btn-link p-0">
                            Kirim ulang verifikasi
                        </button>
                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <div class="alert alert-success">
                            Link verifikasi sudah dikirim!
                        </div>
                    @endif
                @endif

                {{-- BUTTON --}}
                <div class="mt-3">
                    <button class="btn btn-primary">
                        💾 Save
                    </button>
                </div>

                {{-- SUCCESS --}}
                @if (session('status') === 'profile-updated')
                    <div class="alert alert-success mt-3">
                        Profile berhasil diupdate!
                    </div>
                @endif

            </form>

        </div>
    </div>

</section>