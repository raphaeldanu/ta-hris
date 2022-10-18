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
          <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('roles') }}">Roles</a></li>
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
    <!-- Small boxes (Stat box) -->
    <div class="col">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Change Info</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ url('roles/'.$role->id) }}" method="POST">
          @csrf
          @method('put')
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control form-control-border border-width-2 @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name" value="{{ old('name', $role->name) }}">
              @error('name') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <h6><b>Abilities</b></h6>
            @foreach ($permissions as $item) 
            <div class="form-group">
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="{{ $item->id }}" name="{{ $item->id }}" @if ($role->permissions->contains('id', $item->id)) checked @endif>
                <label class="custom-control-label" for="{{ $item->id }}">{{ Str::headline($item->name) }}</label>
              </div>
            </div>
            @endforeach
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col connectedSortable">
      </section>
      <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection