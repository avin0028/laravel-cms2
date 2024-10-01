@extends('layouts.dashboard')

@section('title', 'Create a User')

@section('content')
    <div class=" mt-4 w-50">
        <h2>Create a New User</h2>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <form action="{{route('createtheuser')}}" method="POST">
            @csrf   
            
            <!-- Name Field -->
            <div class="mb-3">
                <label for="name" class="form-label text-light">Name</label>
                <input type="text" class="form-control bg-dark text-light border-secondary" id="name" name="name" placeholder="Enter user name" required>
                <x-input-error name="name"/>
            </div>

            <!-- Email Field -->
            <div class="mb-3">
                <label for="email" class="form-label text-light">Email</label>
                <input type="email" name="email" class="form-control bg-dark text-light border-secondary" id="email" name="email" placeholder="Enter user email" required>
                <x-input-error name="email"/>

            </div>

            <!-- Password Field -->
            <div class="mb-3">
                <label for="password" class="form-label text-light">Password</label>
                <input type="password" class="form-control bg-dark text-light border-secondary" id="password" name="password" placeholder="Enter password" required>
                <x-input-error name="password"/>

            </div>

            <!-- Roles Radio Buttons -->
            <div class="mb-3">
                <label class="form-label text-light">Assign Role</label>
                <div class="form-check">
                    <input class="form-check-input bg-dark text-light border-secondary" type="radio" id="role_writer" name="role"  value="writer" required>
                    <label class="form-check-label text-light" for="role_writer">Writer</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input bg-dark text-light border-secondary" type="radio" id="role_admin" name="role" checked value="admin" required>
                    <label class="form-check-label text-light" for="role_admin">Admin</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input bg-dark text-light border-secondary" type="radio" id="role_editor" name="role" value="editor" required>
                    <label class="form-check-label text-light" for="role_editor">Editor</label>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Create User</button>
        </form>
      
    </div>
@endsection
