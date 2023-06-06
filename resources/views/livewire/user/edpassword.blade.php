
<div>
    <div aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-arrwo">
            <li class="breadcrumb-item">Olah Data</li>
            <li class="breadcrumb-item">User</li>
            <li class="breadcrumb-item active">Ubah Data</li>
        </ol>
    </div>
    <div class="card shadow col-lg-12 grid-margin stretch-card">
        <div class="card-title m-3">
            <h4>
                <a href="{{ route('user.profil', Auth::user()->id) }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                <i class="mdi mdi-pencil-box"></i>
                UBAH PASSWORD
            </h4>
        </div>
        <div class="card-body">
            @if ($userId != Auth::user()->id)

                <div class="main-wrapper">
                    <div class="page-wrapper full-page">
                        <div class="page-content d-flex align-items-center justify-content-center">

                            <div class="row w-100 mx-0 auth-page">
                                <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
                                    <img src="{{ asset('/assets/images/others/404.svg') }}" class="img-fluid mb-2" alt="404">
                                    <h1 class="fw-bolder mb-22 mt-2 tx-80 text-muted">404</h1>
                                    <h4 class="mb-2">Page Not Found</h4>
                                    <h6 class="text-muted mb-3 text-center">Oopps!! Halaman yang kamu akses tidak pernah ada.</h6>
                                    <a href="{{ route('user.profil', Auth::user()->id) }}" class="btn btn-danger btn-sm shadow"><i class="mdi mdi-close"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @else

                <form action="" wire:submit.prevent="updatePass">

                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="oldpassword" class="col-form-label">Password Lama: </i></label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input id="oldpassword" name="oldpassword" type="password" wire:model="oldpassword" class="form-control @error('oldpassword') is-invalid @enderror" placeholder="Masukkan Password Lama">
                                <a class="input-group-text toggle-password" onclick="oldPasswordToggle()" id="toggle-old" ><h4><i class="mdi mdi-eye-off"></h4></i></a>
                                @error('oldpassword')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="newpassword" class="col-form-label">Password Baru: </i></label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input id="newpassword" name="newpassword" type="password" wire:model="newpassword" class="form-control @error('newpassword') is-invalid @enderror" placeholder="Masukkan Password Baru">
                                <a class="input-group-text toggle-password" onclick="newPasswordToggle()" id="toggle-new" ><h4><i class="mdi mdi-eye-off"></h4></i></a>
                                @error('newpassword')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <label for="confirmpassword" class="col-form-label">Konfirmasi Password Baru: </i></label>
                        </div>
                        <div class="col-lg-8">
                            <div class="input-group">
                                <input id="confirmpassword" name="confirmpassword" type="password" wire:model="confirmpassword" class="form-control @error('confirmpassword') is-invalid @enderror" placeholder="Masukkan Kembali Password Baru">
                                <a class="input-group-text toggle-password" onclick="conPasswordToggle()" id="toggle-con" ><h4><i class="mdi mdi-eye-off"></h4></i></a>
                                @error('confirmpassword')
                                    <span class="invalid-feedback">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary shadow"><i class="mdi mdi-content-save"></i> SIMPAN</button>
                </form>
            @endif
        </div>
    </div>
</div>

<script>
    function oldPasswordToggle() {
      var passwordInput = document.getElementById('oldpassword');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
      } else {
        passwordInput.type = 'password';
      }
    }
</script>
<script>
    var button = document.getElementById("toggle-old");

    button.addEventListener("click", function() {
    this.classList.toggle("active");

    if (this.classList.contains("active")) {
        this.innerHTML = '<h4><i class="mdi mdi-eye"></h4></i>';
    } else {
        this.innerHTML = '<h4><i class="mdi mdi-eye-off"></h4></i>';
    }
    });
</script>
<script>
    function newPasswordToggle() {
      var passwordInput = document.getElementById('newpassword');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
      } else {
        passwordInput.type = 'password';
      }
    }
</script>
<script>
    var button = document.getElementById("toggle-new");

    button.addEventListener("click", function() {
    this.classList.toggle("active");

    if (this.classList.contains("active")) {
        this.innerHTML = '<h4><i class="mdi mdi-eye"></h4></i>';
    } else {
        this.innerHTML = '<h4><i class="mdi mdi-eye-off"></h4></i>';
    }
    });
</script>
<script>
    function conPasswordToggle() {
      var passwordInput = document.getElementById('confirmpassword');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
      } else {
        passwordInput.type = 'password';
      }
    }
</script>
<script>
    var button = document.getElementById("toggle-con");

    button.addEventListener("click", function() {
    this.classList.toggle("active");

    if (this.classList.contains("active")) {
        this.innerHTML = '<h4><i class="mdi mdi-eye"></h4></i>';
    } else {
        this.innerHTML = '<h4><i class="mdi mdi-eye-off"></h4></i>';
    }
    });
</script>
