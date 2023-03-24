<section class="py-5">
    <style>
        .blockquote-custom {
            position: relative;
            font-size: 1.1rem;
        }

        .blockquote-custom-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: -25px;
            left: 50px;
        }

        body {
            background: #eff0eb;
            background-image: url('https://i.postimg.cc/MTbfnkj6/bg.png');
            background-size: cover;
            background-repeat: no-repeat;
        }

    </style>
    <div class="container">

        <div class="row">
            <div class="col-lg-12 mx-auto">

                <h5>prodi/<a href="">show</a></h5>
                <hr>
                <blockquote class="blockquote blockquote-custom bg-white p-5 shadow rounded">
                    <div class="blockquote-custom-icon bg-info shadow-sm"><i class="icon-quote-left text-white"></i>
                    </div>
                    <h2>{{ $this->judul }}</h2>
                    <p class="mb-0 mt-2 font-italic">{{ $this->nama_prodi }}</p>
                    <footer class="blockquote-footer pt-4 mt-4 border-top">
                        <i class="icon-quote-left"></i> {{ $this->isi_berita }} <i class="icon-quote-right"></i>
                        <hr>
                        <div class="mt-2 btn btn-primary">
                            <cite title="Source Title"><a href="{{ route('prodi.index') }}" class="text-white"><i
                                        class="icon-close"></i> Kembali</a></cite>
                        </div>
                        @if (Auth::user()->role == "ADMIN")

                        <button wire:click="destroy({{ $this->prodiId }})" class="mt-2 shadow btn btn-danger"><i
                                class="icon-delete_forever"></i><cite> Hapus</cite></button>
                        @endif
                    </footer>
                </blockquote>

            </div>
        </div>
    </div>
</section>
