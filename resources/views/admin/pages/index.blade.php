@extends('admin.layouts.app')

@section('content')

    <section class="container my-5 py-5">
        <h3 class="fw-bold">Selamat datang <span class="text-primary">Admin Arya</span></h3>

        <h3 class="mt-5">Daftar Berita</h3>
        <div class="line-primary" style="width: 162px"></div>

        <a href="{{route('news.create')}}" class="btn btn-success text-light my-4">+ Tambah Berita Baru</a>

        @if(Session::has('success'))
        <div class="alert alert-success fw-bold w-50">
          {{Session::get('success')}}
        </div>
        @endif
       
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                   @forelse($data as $item)
                   <tr>
                    <td>{{$loop->iteration}}</td>
                    <td><img src="{{'https://s3-amazing-news.s3.ap-southeast-1.amazonaws.com/lks/aryarizkytriputra' . $item->photo}}" width="200px" class="rounded"></td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->user->name}}</td>
                    <td class="d-flex justify-content-evenly">
                        <a href="{{route('news.detail', $item->id)}}" class="btn btn-primary text-light">LIHAT</a>
                        <a href="{{route('news.edit', $item->id)}}" class="btn btn-warning text-light">UBAH</a>
                        <form action="{{route('news.delete')}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus berita ini?')" class="btn btn-danger">HAPUS</button>
                        </form>
                    </td>
                    </tr>
                   @empty
                   <tr>
                       <td colspan="6" class="text-center">Tidak ada berita</td>
                   </tr>
                   @endforelse
                </tr>
            </tbody>
        </table>
    </section>

@endsection