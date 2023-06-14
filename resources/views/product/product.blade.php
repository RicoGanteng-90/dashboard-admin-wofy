@extends('main-layout.layout')

@section('title', 'product')

@section('content')
<div class="container-fluid">

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Blank Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <b>
    @if(session('success'))
        <div style="text-align: center" class="alert alert-success">{{session('success')}}</div>

    @endif

    @error('error')
        <div style="text-align: center" class="alert alert-danger">{{session('error')}}</div>
    @enderror
    </b>

    <div class="card">
        <div class="card-body">
          <h5 style="text-align:center" class="card-title">Masukkan data produk</h5>

          <!-- Vertical Form -->
          <form class="row g-3" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-8">
              <label for="name" class="form-label">Name</label>
              <input name="name" type="text" class="form-control" id="name" required>
            </div>
            <div class="col-4">
                <label for="price" class="form-label">Harga</label>
                <input name="price" type="text" class="form-control" id="price" onkeypress="if(this.value.length == 16) return false;" required>
              </div>
            <div class="col-4">
                <label for="category" class="form-label">Kategori</label>
                  <select name="category" class="form-select" id="category" aria-label="State" required>
                    <option value="" disabled selected>Pilih kategori--</option>
                    <option value="Makeup">Makeup</option>
                    <option value="Paket Wedding">Paket Wedding</option>
                    <option value="Extra Wedding">Extra Wedding</option>
                    <option value="Paket Foto">Paket Foto</option>
                  </select>
              </div>
              <div class="col-8">
                <div class="form-floating">
                  <textarea name="keterangan" class="form-control" placeholder="Kategori" id="keterangan" style="height: 100px;" required></textarea>
                  <label for="kategory">Keterangan</label>
                </div>
              </div>
              <div class="col-12">
                <label for="image" class="form-label">Gambar</label>
                <input name="image" type="file" class="form-control" id="image" required>
              </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>

      <div class="row">
        @foreach($product as $prod)
        <div class="col-lg-4">
            <div class="card">
                <img src="{{ asset('product/'.$prod->image) }}" class="card-img-top" alt="">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-title">{{ $prod->name }}</h5>
                        <p class="card-text">{{ $prod->category }}</p>
                    </div>
                    <b><p class="card-text" style="font-style:italic"><span>Rp. </span>{{number_format($prod->price,2,',','.')}}<span></span></p></b><br>
                    <p class="card-text">{{ $prod->keterangan }}</p>

                    <div class="d-flex justify-content-between">
                        <a href="{{ url('product-show/'.$prod->id) }}" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateProduct{{ $prod->id }}"><i class="bi bi-pencil-square"></i> Update</a>
                            <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal"><i class="bi bi-trash"></i> Delete</button>

                            <div class="modal fade" id="updateProduct{{$prod->id}}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">Scrolling Modal</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="min-height: 650px;">
                                        <img src="{{ asset('product/'.$prod->image) }}" class="card-img-top" alt=""><br><br>

                                        <form class="row g-3" action="{{route('product.update')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="col-6">
                                            <label for="name" class="form-label">Name</label>
                                            <input name="name" type="text" class="form-control" id="name" value="{{$prod->name}}" required>
                                          </div>
                                          <div class="col-4">
                                            <label for="price" class="form-label">Harga</label>
                                            <input name="price" type="text" class="form-control" id="price" onkeypress="if(this.value.length == 16) return false;" required>
                                          </div>
                                        <div class="col-4">
                                            <label for="category" class="form-label">Kategori</label>
                                              <select name="category" class="form-select" id="category" aria-label="State" required>
                                                <option value="" disabled selected>Pilih kategori--</option>
                                                <option value="Makeup">Makeup</option>
                                                <option value="Paket Wedding">Paket Wedding</option>
                                                <option value="Extra Wedding">Extra Wedding</option>
                                                <option value="Paket Foto">Paket Foto</option>
                                              </select>
                                          </div>
                                          <div class="col-8">
                                            <div class="form-floating">
                                              <textarea name="keterangan" class="form-control" placeholder="Kategori" id="keterangan" style="height: 100px;" required></textarea>
                                              <label for="kategory">Keterangan</label>
                                            </div>
                                          </div>
                                          <div class="col-12">
                                            <label for="image" class="form-label">Gambar</label>
                                            <input name="image" type="file" class="form-control" id="image" required>
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                                  </div>
                                </div>
                              </div><!-- End Scrolling Modal-->

                        <div class="modal fade" id="basicModal" tabindex="-1">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">Confirmation.</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  Yakin untuk menghapus?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                    <form action="{{ url('product-delete/'.$prod->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" >Ya</button>
                                    </form>
                                </div>
                              </div>
                            </div>
                          </div><!-- End Basic Modal-->

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>




  </main><!-- End #main -->
</div>
@endsection
