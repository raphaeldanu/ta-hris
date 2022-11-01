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
          <li class="breadcrumb-item"><a href="{{ url('levels') }}">Levels</a></li>
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
        <form action="{{ url('salary-ranges/'.$salaryRange->id) }}" method="POST">
          @csrf
          @method('put')
          <div class="card-body">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control form-control-border border-width-2 @error('name') is-invalid @enderror" id="name" placeholder="Position Name" name="name" value="{{ old('name', $salaryRange->name) }}">
              @error('name') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="level_id">Levels</label>
              <select class="custom-select form-control-border border-width- @error('level_id') is-invalid @enderror" id="level_id" name="level_id">
                <option value="{{ $salaryRange->level_id }}">{{ $salaryRange->level->name }}</option>
                @foreach ($levels as $level)
                <option @if (old('level_id') == $level->id) selected @endif value="{{ $level->id }}">{{ Str::headline($level->name) }}</option>
                @endforeach
              </select>
            </div>
            @error('level_id') 
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label for="base_salary">Base Salary (Rp)</label>
              <input type="number" class="form-control form-control-border border-width-2 @error('base_salary') is-invalid @enderror" id="base_salary" placeholder="Position Name" name="base_salary" value="{{ old('base_salary', $level->base_salary) }}">
              @error('base_salary') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
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