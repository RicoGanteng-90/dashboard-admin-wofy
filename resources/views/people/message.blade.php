@extends('main-layout.layout')

@section('title', 'Message')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Message</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/home">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Message</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <b>
        @if(session('error'))
            <div style="text-align: center" class="alert alert-danger">{{session('error')}}</div>
        @endif

        @if(session('success'))
            <div style="text-align: center" class="alert alert-success">{{session('success')}}</div>
        @endif
        </b>

    <section class="section">
      <div class="row">
        <div class="col-lg-12">


            <form action="{{ route('message.destroy') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')

          <div class="card">
            <div class="card-body">
                <div class="col-sm-12 d-flex justify-content-between">
                    <h5 class="card-title">Message</h5>
                    <div class="d-flex">
                        <button name="delete-message" type="submit" class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus?');">Delete</button>
                    </div>
                </div>

<!-- Table with stripped rows -->
<table class="table datatable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Number</th>
        <th scope="col">Message</th>
      </tr>
    </thead>
    <tbody>

    @foreach($message as $mes)

      <tr>
        <th scope="row">{{$mes->id}}<input type="checkbox" name="message[]" value="{{$mes->id}}"></th>
        <td>{{$mes->name}}</td>
        <td>{{$mes->email}}</td>
        <td>{{$mes->number}}</td>
        <td>{{$mes->message}}</td>
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
@endsection
