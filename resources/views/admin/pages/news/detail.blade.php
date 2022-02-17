@extends('layouts.app')

@section('content')
<section class="container mb-5 mt-3 py-3">
    <img src="{{'https://s3-amazing-news.s3.ap-southeast-1.amazonaws.com/lks/aryarizkytriputra' . $data->photo}}" class="col-md-6 rounded">
    <div class="col-md-12">
        <div class="btn btn-outline-primary mt-3">
            {{$data->category->name}}
        </div>
        <h3 class="fw-bold mt-3">{{$data->title}}</h3>

        <p class="mt-4">{{$data->content}}</p>
    </div>
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
                <form action="{{route('response.delete', $item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$item->id}}">
                     <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Apakah anda yakin ingin menghapus tanggapan ini?')">HAPUS</button>
                </form>
            </div>
        </div>
    @empty
    <p class="text-center fw-bold">Belum ada tanggapan </p>
    @endforelse
    </div>
   
</section>


@endsection