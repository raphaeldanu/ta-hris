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
          <li class="breadcrumb-item"><a href="{{ url('users') }}">Users</a></li>
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
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ url('users') }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control form-control-border border-width-2 @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name" value="{{ old('name') }}">
              @error('name') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control form-control-border border-width-2 @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ old('username') }}">
              @error('username') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control form-control-border border-width-2 @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
              @error('password') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password_confirmation">Password Confirmation</label>
              <input type="password" class="form-control form-control-border border-width-2" id="password_confirmation" placeholder="Password Confirmation" name="password_confirmation">
            </div>
            <div class="form-group">
              <label for="role">Role</label>
              <select class="custom-select form-control-border border-width- @error('role') is-invalid @enderror" id="role" name="role">
                <option value="">Choose One</option>
                @foreach ($roles as $role)
                <option @if (old('role') == $role->value) selected @endif value="{{ $role->value }}">{{ Str::headline($role->name) }}</option>
                @endforeach
              </select>
            </div>
            @error('role') 
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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