@extends('layouts.app')

@section('content')
<div style="display:grid; grid-template-columns:repeat(6, 1fr); gap:32px; min-height:100vh; align-items:center; justify-content:center; background:#f3f4f6;">
    <div style="grid-column:2/6; background:white; border-radius:16px; box-shadow:0 4px 16px #0002; padding:32px; border:1px solid #f3f4f6;">
        <h2 style="text-align:center; font-size:1.5rem; font-weight:700; color:#2563eb; margin-bottom:24px;">Register</h2>
        @if ($errors->any())
            <div style="background:#fee2e2; border:1px solid #fca5a5; color:#b91c1c; padding:12px; border-radius:8px; margin-bottom:16px;">
                <ul style="margin:0; padding-left:18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom:16px;">
                <label for="username" style="font-weight:500;">Username</label>
                <input id="username" type="text" name="username" placeholder="janesmith" value="{{ old('username') }}" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
            </div>
            <div style="margin-bottom:16px;">
                <label for="about" style="font-weight:500;">About</label>
                <textarea id="about" name="about" rows="3" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">{{ old('about') }}</textarea>
            </div>
            <div style="margin-bottom:16px;">
                <label for="name" style="font-weight:500;">Name</label>
                <input id="name" type="text" name="name" autocomplete="given-name" value="{{ old('name') }}" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
            </div>
            <div style="margin-bottom:16px;">
                <label for="email" style="font-weight:500;">Email address</label>
                <input id="email" type="email" name="email" autocomplete="email" value="{{ old('email') }}" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
            </div>
            <div style="margin-bottom:16px;">
                <label for="no_hp" style="font-weight:500;">No. HP</label>
                <input id="no_hp" type="text" name="no_hp" value="{{ old('no_hp') }}" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
            </div>
            <div style="margin-bottom:16px;">
                <label for="alamat" style="font-weight:500;">Alamat</label>
                <input id="alamat" type="text" name="alamat" value="{{ old('alamat') }}" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
            </div>
            <div style="margin-bottom:16px;">
                <label for="password" style="font-weight:500;">Password</label>
                <input id="password" type="password" name="password" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
            </div>
            <div style="margin-bottom:16px;">
                <label for="password_confirmation" style="font-weight:500;">Konfirmasi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc;">
            </div>
            <button type="submit" style="width:100%; background:#2563eb; color:white; padding:10px; border-radius:8px; font-weight:600; border:none;">Register</button>
        </form>
        <p style="margin-top:24px; text-align:center; font-size:1rem; color:#555;">
            Sudah punya akun?
            <a href="{{ route('login') }}" style="font-weight:600; color:#2563eb; text-decoration:none;">Login</a>
        </p>
    </div>
</div>
@endsection
