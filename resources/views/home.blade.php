<!-- @extends('layouts.main_layout')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">
            <div class="row mb-3 align-items-center">
                <div class="col">
                    <img src="assets/images/logo.png" alt="Notes logo">
                </div>
                <div class="col text-center">
                    Exemplo de projeto <span class="text-warning">Laravel</span>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end align-items-center"><span class="me-3"><i
                                class="fa-solid fa-user-circle fa-lg text-secondary me-3"></i>[username]</span>
                        <a href="{{ route('logout') }}" class="btn btn-outline-secondary px-3">
                            Logout<i class="fa-solid fa-arrow-right-from-bracket ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-5">
                <div class="col text-center">
                    <p class="display-6 mb-5 text-secondary opacity-50">Você não tem notas disponíveis!</p>
                    <a href="#" class="btn btn-secondary btn-lg p-3 px-5">
                        <i class="fa-regular fa-pen-to-square me-3"></i>Criar sua primeira Nota
                    </a>
                </div>
            </div>
            <hr class="my-5">
            <div class="d-flex justify-content-end mb-3"><a href="#" class="btn btn-secondary px-3">
                    <i class="fa-regular fa-pen-to-square me-2"></i>Nova Nota
                </a>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card p-4">
                        <div class="row">
                            <div class="col">
                                <h4 class="text-info">Título da Nota</h4>
                                <small class="text-secondary"><span class="opacity-75 me-2">Created
                                        at:</span><strong>00/00/0000 00:00:00</strong></small>
                            </div>
                            <div class="col text-end">
                                <a href="#" class="btn btn-outline-secondary btn-sm mx-1"><i
                                        class="faregular fa-pen-to-square"></i></a>
                                <a href="#" class="btn btn-outline-danger btn-sm mx-1"><i
                                        class="faregular fa-trash-can"></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-secondary">Lorem ipsum dolor, sit amet consectetur adipisicing
                            elit. Mollitia temporibus necessitatibus nesciunt quam repellat porro commodi autem
                            veniam doloribus nostrum magni rerum, libero ullam maxime praesentium cum velit.
                            Recusandae, aspernatur.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- @extends('layouts.main_layout')

@section('content')

    <div class="d-flex justify-content-between align-items-center p-3" style="background: linear-gradient(to top, #f3309b, #0a0c33);
                border-bottom: 2px solid #8cfffb;
                width: 100%;
                position: relative;
                left: 0;
                top: 0;">
        <a href="{{ route('login') }}" title="Login / Registrar">
            <img src="{{ asset('assets/images/user_icon.png') }}" width="80" height="80" alt="Login">
        </a>

        <h2 class="m-0 text-center" style="color: #8cfffb; font-weight: bold;">LotusMangas</h2>

        <a href="{{ route('login') }}" title="Buscar Obras">
            <img src="{{ asset('assets/images/search_icon.png') }}" width="50" height="50" alt="Buscar">
        </a>
    </div>

    <div class="container-fluid d-flex flex-column min-vh-100 p-0">
        <div class="flex-grow-1">
            {{--
        <div class="row">
            @foreach ($obras as $obra)
            <div class="col-12 mb-4">
                <div class="d-flex align-items-center p-3"
                    style="background-color: #1b263b; border: 1px solid #00a8f3; border-radius: 8px; color: #00a8f3;">

                    <img src="{{ asset('storage/capas/' . $obra->capa) }}" alt="Capa" class="me-3" width="80" height="100"
                        style="object-fit: cover; border: 2px solid #8cfffb;">

                    <div class="flex-grow-1 text-center">
                        <h5 class="mb-0" style="color: #8cfffb;">{{ $obra->titulo }}</h5>
                    </div>

                    <div class="ms-3 text-end">
                        <span class="badge bg-success" style="font-size: 1.1rem;">
                            ⭐ {{ number_format($obra->nota, 1) }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        --}}
        </div>

        <footer class="text-center mt-auto py-3" style="color: #add8e6; background: transparent;">
            <small>&copy; {{ date('Y') }} LotusMangas</small>
        </footer>
    </div>

@endsection -->

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">
            <!-- Cabeçalho -->
            <div class="row mb-3 align-items-center">
                <div class="col">
                    <img src="assets/images/logo.png" alt="Notes logo">
                </div>

                <div class="col text-center">
                    Exemplo de projeto <span class="text-warning">Laravel</span>
                </div>

                <div class="col">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Nome do usuário à esquerda -->
                        <span class="me-3">
                            <i class="fa-solid fa-user-circle fa-lg text-secondary me-2"></i>
                            [username]
                        </span>

                        <!-- Funções à direita -->
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-secondary px-3 me-2">
                                <i class="fa-regular fa-pen-to-square me-2"></i>Nova Nota
                            </a>

                            <!-- Logout (POST) -->
                            <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary px-3">
                                    Logout <i class="fa-solid fa-arrow-right-from-bracket ms-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <!-- Conteúdo -->
            <div class="row mt-5">
                <div class="col text-center">
                    <p class="display-6 mb-5 text-secondary opacity-50">Você não tem notas disponíveis!</p>
                    <a href="#" class="btn btn-secondary btn-lg p-3 px-5">
                        <i class="fa-regular fa-pen-to-square me-3"></i>Criar sua primeira Nota
                    </a>
                </div>
            </div>

            <hr class="my-5">

            <!-- Lista de notas -->
            <div class="row">
                <div class="col">
                    <div class="card p-4">
                        <div class="row">
                            <div class="col">
                                <h4 class="text-info">Título da Nota</h4>
                                <small class="text-secondary">
                                    <span class="opacity-75 me-2">Created at:</span>
                                    <strong>00/00/0000 00:00:00</strong>
                                </small>
                            </div>
                            <div class="col text-end">
                                <a href="#" class="btn btn-outline-secondary btn-sm mx-1">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="#" class="btn btn-outline-danger btn-sm mx-1">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <p class="text-secondary">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia temporibus
                            necessitatibus nesciunt quam repellat porro commodi autem veniam doloribus nostrum magni
                            rerum, libero ullam maxime praesentium cum velit. Recusandae, aspernatur.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>