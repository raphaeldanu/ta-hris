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
              <a href="{{ url('salary-ranges/create') }}" class="btn btn-primary">Create New Salary Range</a>
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
                  <th>Salary Range Name</th>
                  <th>Level Name</th>
                  <th class="col-2 text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($salaryRanges as $salary_range)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $salary_range->name }}</td>
                  <td>{{ $salary_range->level->name }}</td>
                  <td>
                    <div class="d-flex justify-content-around align-items-center">
                      <a href="/salary-ranges/{{ $salary_range->id }}" class="btn bg-info"><i class="fas fa-info-circle"></i></a>
                      <a href="/salary-ranges/{{ $salary_range->id }}/edit" class="btn bg-warning"><i class="fas fa-edit"></i></a>
                      <form method="post" action="/salary-ranges/{{ $salary_range->id }}">
                          @csrf @method('delete')
                          <button type="submit" class="btn bg-danger"
                              onclick="return confirm('Apakah anda yakin untuk menghapusnya ?')"><i
                                  class="fas fa-trash"></i></button>
                      </form>
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