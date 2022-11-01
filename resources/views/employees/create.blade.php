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
          <li class="breadcrumb-item"><a href="{{ url('salay-ranges') }}">Salary Range</a></li>
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
        <form action="{{ url('salary-ranges') }}" method="POST">
          @csrf
          <input type="hidden" value="{{$user_id}}" name="user_id">
          <div class="card-body">
            <div class="form-group">
              <label for="nik">NIK</label>
              <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik" placeholder="NIK" name="nik" value="{{ old('nik') }}">
              @error('nik') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="name">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Lengkap Karyawan" name="name" value="{{ old('name') }}">
              @error('name') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="bpjs_tk_number">No. BPJS Ketenagakerjaan</label>
              <input type="text" class="form-control @error('bpjs_tk_number') is-invalid @enderror" id="bpjs_tk_number" placeholder="No BPJS Ketenagakerjaan" name="bpjs_tk_number" value="{{ old('bpjs_tk_number') }}">
              @error('bpjs_tk_number') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="bpjs_kes_number">No. BPJS Kesehatan</label>
              <input type="text" class="form-control @error('bpjs_kes_number') is-invalid @enderror" id="bpjs_kes_number" placeholder="No BPJS Kesehatan" name="bpjs_kes_number" value="{{ old('bpjs_kes_number') }}">
              @error('bpjs_kes_number') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="bpjs_npwp_number">No. NPWP BPJS</label>
              <input type="text" class="form-control @error('bpjs_npwp_number') is-invalid @enderror" id="bpjs_npwp_number" placeholder="No BPJS Kesehatan" name="bpjs_npwp_number" value="{{ old('bpjs_npwp_number') }}">
              @error('bpjs_npwp_number') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="position_id">Posisi</label>
              <select class="custom-select border-width- @error('position_id') is-invalid @enderror" id="position_id" name="position_id">
                <option value="">Choose One</option>
                @foreach ($positions as $position)
                <option @if (old('position_id') == $position->id) selected @endif value="{{ $position->id }}">{{ Str::headline($position->name) }}</option>
                @endforeach
              </select>
              @error('position_id') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="salary_range_id">Level Gaji</label>
              <select class="custom-select border-width- @error('salary_range_id') is-invalid @enderror" id="salary_range_id" name="salary_range_id">
                <option value="">Choose One</option>
                @foreach ($salaryRanges as $salaryRange)
                <option @if (old('salary_range_id') == $salaryRange->id) selected @endif value="{{ $salaryRange->id }}">{{ Str::headline($salaryRange->name) }}</option>
                @endforeach
              </select>
              @error('salary_range_id') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            @error('salary_range_id') 
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label>Tanggal First Join</label>
              <div class="input-group date " id="first_join_date" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" name="first_join_date" data-target="#first_join_date" placeholder="Pilih tanggal"/>
                <div class="input-group-append" data-target="#first_join_date" data-toggle="datetimepicker">
                  <div class="input-group-text "><i class="fas fa-calendar"></i></div>
                </div>
              </div>
              @error('first_join_date') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Tanggal Mulai Kontrak Terakhir</label>
              <div class="input-group date " id="last_contract_start" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" name="last_contract_start" data-target="#last_contract_start" placeholder="Pilih tanggal"/>
                <div class="input-group-append" data-target="#last_contract_start" data-toggle="datetimepicker">
                  <div class="input-group-text "><i class="fas fa-calendar"></i></div>
                </div>
              </div>
              @error('last_contract_start') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Tanggal Selesai Kontrak Terakhir</label>
              <div class="input-group date " id="last_contract_end" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" name="last_contract_end" data-target="#last_contract_end" placeholder="Pilih tanggal"/>
                <div class="input-group-append" data-target="#last_contract_end" data-toggle="datetimepicker">
                  <div class="input-group-text "><i class="fas fa-calendar"></i></div>
                </div>
              </div>
              @error('last_contract_end') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <div class="input-group date " id="birth_date" data-target-input="nearest">
                <input type="text" class="form-control datetimepicker-input" name="birth_date" data-target="#birth_date" placeholder="Pilih tanggal"/>
                <div class="input-group-append" data-target="#birth_date" data-toggle="datetimepicker">
                  <div class="input-group-text "><i class="fas fa-calendar"></i></div>
                </div>
              </div>
              @error('birth_date') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tax_status">Status Pajak</label>
              <input type="text" class="form-control @error('tax_status') is-invalid @enderror" id="tax_status" placeholder="Status Pajak" name="tax_status" value="{{ old('tax_status') }}">
              @error('tax_status') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Alamat KTP</label>
              <textarea class="form-control @error('address_on_id') is-invalid @enderror"" rows="3" placeholder="Alamat di KTP" name="address_on_id" id="address_on_id"></textarea>
              @error('address_on_id') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="phone_number">Nomor Hp</label>
              <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Status Pajak" name="phone_number" value="{{ old('phone_number') }}">
              @error('phone_number') 
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="blood_type">Golongan Darah</label>
              <select class="custom-select border-width- @error('blood_type') is-invalid @enderror" id="blood_type" name="blood_type">
                <option value="">Choose One</option>
                <option @if (old('blood_type') == 'A') selected @endif value="A">A</option>
                <option @if (old('blood_type') == 'B') selected @endif value="B">B</option>
                <option @if (old('blood_type') == 'AB') selected @endif value="AB">AB</option>
                <option @if (old('blood_type') == 'O') selected @endif value="O">O</option>
              </select>
              @error('blood_type') 
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
@section('user-script')
<script>
  //Date picker
  $('#first_join_date').datetimepicker({
        format: 'L'
    });
  $('#last_contract_start').datetimepicker({
        format: 'L'
    });
  $('#last_contract_end').datetimepicker({
        format: 'L'
    });
  $('#birth_date').datetimepicker({
        format: 'L'
    });
</script>
@endsection