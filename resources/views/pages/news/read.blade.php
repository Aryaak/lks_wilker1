@extends('layouts.app')

@section('content')
<section class="container mb-5 mt-3 py-3">
    <img src="{{'https://s3-amazing-news.s3.ap-southeast-1.amazonaws.com/lks/aryarizkytriputra' . $data->photo}}" class="col-md-6 rounded">
    <div class="col-md-12">
        <div class="btn btn-outline-primary mt-3">
        {{$data->category->name}}
        </div>
        <h3 class="fw-bold mt-3">{{$data->title}}</h3>

           
        <p>  {{$data->created_at->diffForHumans()}}</p>

        <p class="mt-4">{{$data->content}}</p>
    </div>
    <hr>
</section>

<section class="container my-5">
    <h3>Berita Terkait</h3>
    <div class="line-primary  mb-5" style="width: 330px"></div>

    <div class="mt-3  d-flex  row">
        @foreach($related as $item)
            <a href="{{route('news.read', $item->id)}}" class="card col-md-3 mx-1  my-3 p-0">
                <img height="200px" src="{{'https://s3-amazing-news.s3.ap-southeast-1.amazonaws.com/lks/aryarizkytriputra' . $item->photo}}" class="card-img-top">
                <div class="card-body">
                <div class="card-title">
                    <div class="btn btn-outline-primary">{{$item->category->name}}</div>
                    <h4 class="fw-bold mt-2">{{$item->title}}</h4>
                </div>
                <div class="card-text mt-4">
                    <p class="fw-bold text-secondary">Penulis: <br><span class="text-primary">{{$item->user->name}}</span></p>
                </div>
            </div>
            </a>
        @endforeach
      
    </div>
</section>

<section class="container my-5">
    <h3 >Tulis Tanggapan Anda</h3>
    <div class="line-primary  mb-5" style="width: 280px"></div>
    <form action="{{route('response.store')}}" method="POST" class="col-md-6">
        @csrf
        <input type="hidden" name="news_id" value="{{$data->id}}">
        <div class="form-group mb-3">
            <label for="name" class="form-label" >Nama</label>
            <input required type="text" name="name" id="name" class="form-control"  placeholder="Masukan nama anda...">
        </div>
        <div class="form-group mb-3">
            <label for="response" class="form-label">Tanggapan</label>
            <textarea required name="response" id="response" cols="30" rows="10" class="form-control" placeholder="Masukan tanggapan anda..."></textarea>
        </div>
        <button onclick="return confirm('Apakah anda yakin ingin mengirim tanggapan?')" type="submit" class="btn btn-primary w-100">Kirim Tanggapan</button>
    </form>
    <hr>
</section>


<section class="container my-5">
    <h3 >Tanggapan Para Pembaca</h3>
    <div class="line-primary  mb-5" style="width: 330px"></div>
    <div class="d-flex">
    @forelse($data->responses as $item)
        <div class="card col-md-3 mx-3 my-3">
            <div class="card-body">
                <div class="card-title fw-bold"><h3>{{$item->name}}</h3></div>
                <div class="card-text">{{$item->response}}</div>
            </div>
        </div>
    @empty
    <p class="text-center fw-bold">Belum ada tanggapan <span class="text-primary">jadilah yang pertama menanggapi</span></p>
    @endforelse
    </div>
   
</section>


@endsection