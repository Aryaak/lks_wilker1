<header class="bg-primary">
    <div class="container py-3 mx-auto d-flex justify-content-between text-light">
        <a href="{{route('index')}}">
            <h3 class="fw-bold">AmazingNews</h3>
        </a>
        <form action="{{route('logout')}}" method="POST">
                @csrf
            <button onclick="return confirm('Apakah anda yakin ingin keluar?')" href="{{route('logout')}}" class="btn btn-danger text-light">KELUAR</button>
        </form>
    </div>
</header>