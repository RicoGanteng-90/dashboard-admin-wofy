@extends('main-layout.layout')

@section('title', 'Delete order')

@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Orders</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    @if(session('error'))
        <div style="text-align: center" class="alert alert-danger">{{session('error')}}</div>
    @endif

    @if(session('success'))
        <div style="text-align: center" class="alert alert-success">{{session('success')}}</div>
    @endif

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

        <form action="{{ route('order.destroy') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Datatables</h5>
            <div class="col-sm-12 d-flex justify-content-between">
                <p>Silahkan olah order yang sudah masuk pada tabel di bawah ini.</p>
                <div class="d-flex">
                    <button name="delete-order" type="submit" class="btn btn-danger d-block mx-auto" onclick="return confirm('Yakin untuk menghapus?');">Delete</button>
                </div>
            </div>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Method</th>
                    <th scope="col">Address</th>
                    <th scope="col">Total products</th>
                    <th scope="col">Total price</th>
                    <th scope="col">Order time</th>
                    <th scope="col">Event time</th>
                    <th scope="col">Order status</th>
                    <th scope="col">Proof payment</th>
                    <th scope="col">Payment status</th>
                  </tr>
                <tbody>
                    @foreach($order as $ord)
                  <tr>
                    <th scope="row">{{$ord->id}}<input type="checkbox" name="order[]" value="{{$ord->id}}"></th>
                    <td>{{$ord->name}}</td>
                    <td>{{$ord->number}}</td>
                    <td>{{$ord->email}}</td>
                    <td>{{$ord->method}}</td>
                    <td>{{$ord->address}}</td>
                    <td>{{$ord->total_products}}</td>
                    <td>{{$ord->total_price}}</td>
                    <td>{{$ord->order_time}}</td>
                    <td>{{$ord->event_time}}</td>
                    <td>{{$ord->order_status}}</td>
                    <td><img src="{{ asset ('bukti/'.$ord->proof_payment)}}" alt=""></td>
                    <td>{{$ord->payment_status}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
            </div>
          </div>
        </form>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection
