@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Profile</h2>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-primary text-white">Update Profile Information</div>
            <div class="card-body">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-success text-white">Update Password</div>
            <div class="card-body">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-danger text-white">Delete Account</div>
            <div class="card-body">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
