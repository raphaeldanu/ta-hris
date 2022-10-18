@extends('layout.main')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">{{ $title }}</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Main row -->
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <div class="card-title">
              <a href="{{ url('roles/create') }}" class="btn btn-primary">Create New Role</a>
            </div>

            <div class="card-tools">
              <ul class="pagination pagination float-right">
                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
              </ul>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Role Name</th>
                  <th class="col-2 text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $role)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $role->name }}</td>
                  <td>
                    <div class="d-flex justify-content-around align-items-center">
                      <a href="/roles/{{ $role->id }}" class="btn bg-info"><i class="fas fa-info-circle"></i></a>
                      <a href="/roles/{{ $role->id }}/edit" class="btn bg-warning"><i class="fas fa-edit"></i></a>
                      @can('delete', $role)
                      <form method="post" action="/roles/{{ $role->id }}">
                          @csrf @method('delete')
                          <button type="submit" class="btn bg-danger"
                              onclick="return confirm('Apakah anda yakin untuk menghapusnya ?')"><i
                                  class="fas fa-trash"></i></button>
                      </form>
                      @endcan
                  </div>
                  </td>
                </tr>
                @endforeach 
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection