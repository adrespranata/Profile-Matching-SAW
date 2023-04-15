@extends('layouts.main')
@section('container')
<div class="card">
    <div class="card-header">{{ __('Edit Pengguna') }}
        <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm float-right">
            <i class="fas fa-arrow-left mr-2"></i>
            <span>Kembali</span>
        </a>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('user.update', $users->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}">
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $users->username }}">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan password">
            </div>
            <div class=" form-group">
                <label for="role">Role:</label>
                <select class="form-control" id="role" name="role_id">
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}" @if ($users->role) selected @endif>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
            <button type="cancel" class="btn btn-sm btn-secondary">Cancel</button>
        </form>
    </div>
</div>
@endsection