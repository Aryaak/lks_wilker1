@extends('admin.layouts.app')

@section('content')
    <section class="container my-5 py-5">
        <h3>Buat Berita</h3>
        <div class="line-primary" style="width: 142px"></div>

        <form action="{{route('news.store')}}" method="POST" enctype="multipart/form-data" class="w-50 mt-4">
            @csrf
            <div class="form-group mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input required type="file" name="photo" id="photo" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="category_id" class="form-label">Foto</label>
                <select required class="form-control" name="category_id" id="category_id">
                    <option value="" selected disabled>-- Pilih Kategori Berita---</option>
                    @foreach($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="title" class="form-label">Judul</label>
                <input required type="text" name="title" id="title" class="form-control" placeholder="Masukan judul berita...">
            </div>
            <div class="form-group mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea required class="form-control" name="content" id="content" cols="30" rows="10" placeholder="Masukan kontent berita"></textarea>
            </div>

            <button onclick="return confirm('Apakah anda yakin ingin membuat berita ini?')" class="btn btn-primary w-100">Buat Berita</button>
        </form>
    </section>
@endsection