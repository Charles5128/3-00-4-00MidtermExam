@extends('layout')

@section('content')

<div class="flex flex-col justify-center items-center min-h-full gap-4">
    <img src="{{ asset('images/signage.jpg') }}" alt="Signage" class="w-[200px]">
    <div class="w-[450px] p-8 bg-white rounded-2xl shadow ">
        <h3 class="text-2xl mb-4 text-orange-900 font-bold">User  Registration</h3>
        <form action="{{ url('/register') }}" method="post">
            @csrf()
            <div class="my-3">
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" id="last_name" required>
            </div>
            <div class="my-3">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" id="first_name" required>
            </div>
            <div class="my-3">
                <label for="designation">Designation</label>
                <input type="text" name="designation" id="designation" required>
            </div>
            <div class="my-3">
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div class="my-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="my-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div class="flex gap-4 items-center">
                <button class="primary">Submit</button>
                <button class="secondary" type="reset">Clear</button>
                <a href="{{ url('/') }}" class="text-green-800 font-bold px-4 py-2 bg-green-200 border border-green-800 rounded">Login</a>
            </div>
        </form>

        @if ($errors->any())
            <div class="mt-4 text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="mt-4 text-green-500">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>

@endsection