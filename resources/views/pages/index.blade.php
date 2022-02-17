@extends('layouts.app')

@section('content')
<section class="mb-5 mt-3 py-3 bg-primary-01o">
    <div class="container my-3 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="fw-bold">Selamat datang di Amazing<span class="text-primary">News</span></h1>
            <p>Kami disini menyediakan banyak berita yang bisa anda baca dengan gratis dan tentunya sangat terpecaya.</p>
        </div>
        <img src="{{asset('img/1.png')}}" width="500px" class="rounded">
    </div>
</section>

<section class="my-5 container">
    <h3>Berita Terbaru</h3>
    <div class="line-primary" style="width: 180px"></div>

    <div class="mt-3 d-flex  flex-wrap row">
        @forelse($data as $item)
        <a href="{{route('news.read', $item->id)}}" class="card col-md-3  my-3 p-0" style="margin-right: 15px">
            <img height="200px" src="{{'https://s3-amazing-news.s3.ap-southeast-1.amazonaws.com/lks/aryarizkytriputra' . $item->photo}}" class="card-img-top">
            <div class="card-body">
                <div class="card-title">
                    <div class="btn btn-outline-primary">{{$item->category->name}}</div>
                    <h4 class="fw-bold mt-2">{{$item->title}}</h4>
                    <p>{{$item->created_at->diffForHumans()}}</p>
                </div>
                <div class="card-text mt-4">
                    <p class="fw-bold text-secondary">Penulis: <br><span class="text-primary">{{$item->user->name}}</span></p>
                </div>
            </div>
        </a>
        @empty
        <p class="text-center">Tidak ada berita</p>
        @endforelse

    </div>
</section>
@endsection