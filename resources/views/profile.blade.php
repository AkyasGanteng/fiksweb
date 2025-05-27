@extends('layouts.app')

@section('content')
<style>
    .profile-container {
        max-width: 700px;
        margin: 30px auto;
        padding: 30px;
        background: #ffffff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        border-radius: 12px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 20px;
    }

    .profile-header img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #1abc9c;
    }

    .profile-header h2 {
        margin: 0;
        font-size: 24px;
        font-weight: bold;
        color: #2c3e50;
    }

    .profile-info {
        margin-top: 20px;
    }

    .profile-info label {
        display: block;
        font-weight: 600;
        margin-bottom: 5px;
        color: #34495e;
    }

    .profile-info input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 15px;
        background-color: #f9f9f9;
    }

    .logout-btn {
        margin-top: 20px;
        background-color: #e74c3c;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    .logout-btn:hover {
        background-color: #c0392b;
    }
</style>

<div class="profile-container">
    <div class="profile-header">
        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=1abc9c&color=fff" alt="Profile Picture">
        <h2>{{ auth()->user()->name }}</h2>
    </div>

    <form class="profile-info">
        <label for="name">Nama Lengkap</label>
        <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" disabled>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" disabled>
    </form>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</div>
@endsection
