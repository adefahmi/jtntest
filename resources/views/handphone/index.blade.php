@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
<h1>Manajemen User</h1>
@stop

@section('content')
<p>Manajemen User</p>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header"><b>Data User</b></div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th width="280px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $user->nik }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ strtoupper($user->roles()->first()->name) }}</td>
                                <td>
                                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>

                                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger delete-confirm" data-name="{{ $user->name }}">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>

$(document).ready(function() {
    $('#datatable').DataTable();
} );

$('.delete-confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      Swal.fire({
        title: 'Konfirmasi',
        text: "Yakin menghapus "+name+" ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#dd3333',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
      })
      .then(function (result) {
        if (result.value) {
            form.submit();
        } else {
            // Swal.fire("Batal");
        }
        });
  });

</script>

@endsection

@section('footer', '2021')
@section('plugins.Sweetalert2', true)

