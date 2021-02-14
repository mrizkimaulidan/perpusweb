@extends('layouts.stisla.index', ['title' => 'Daftar Pengguna', 'section_header' => 'Daftar Pengguna'])

@section('content')
<div class="row">
  <div class="col-lg-12 table-responsive">
    <div class="card px-3 py-3">
      @if(auth()->user()->role_id === 1)
      <div class="row">
        <div class="col-lg-12 px-3 py-3 text-right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-user-modal">
            Tambah Pengguna
          </button>
        </div>
      </div>
      @endif
      <table class="table table-hovered text-center table-bordered" id="datatable">
        <thead>
          <tr>
            <th>#</th>
            <th>Nomor Anggota</th>
            <th>Nama Lengkap</th>
            <th>Jabatan</th>
            <th>Email</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->user_number }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->role->name }}</td>
            <td>{{ $user->email }}</td>
            <td class="text-small {{ $user->status === 1 ? 'text-success' : 'text-danger' }}"><i class="fas fa-circle"
                data-toggle="tooltip" data-placement="top" title="{{ $user->status === 1 ? 'Online' : 'Offline' }}"></i>
            </td>
            <td>
              <button type="submit" data-toggle="modal" data-target="#show-user-modal" data-id="{{ $user->id }}"
                class="btn btn-sm btn-info swal-show-button">
                <i class="fas fa-info-circle"></i>
              </button>
              @if(auth()->user()->role_id === 1 && auth()->user()->id !== $user->id)
              <button type="submit" data-id="{{ $user->id }}" class="btn btn-sm btn-danger swal-delete-button">
                <i class="fas fa-trash-alt"></i>
              </button>
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@push('modal')
@include('admin.users.modal.create')
@include('admin.users.modal.show')
@endpush

@push('js')
@include('admin.users._script')
@endpush