@extends('partials.main')

@section('container')
    <div class="text-[rgb(240,240,240)] w-screen h-screen flex justify-center items-center bg-cover bg-no-repeat " style="background-image: url({{ asset('img/bg-utama.jpg') }})">

        <form action="/register" method="POST" class="w-[95%] sm:w-[60%] md:w-[50%] lg:w-[40%] xl:w-[30%] p-2 border border-neutral-600 text-xl shadow-2xl rounded bg-[rgba(255,255,255,.1)]">
            @csrf
            <h1 class="text-3xl text-center font-medium">Register Warung Madura</h1>
            <div class="row mt-5 flex flex-col gap-1 w-full">
                <label for="username" class="@error('username') text-red-500 @enderror">Username</label>
                <input required autocomplete="off" class="bg-[rgba(255,255,255,.2)] w-full py-2 px-2.5 outline-none rounded border border-neutral-500 @error('username') border-red-500 @else  @enderror" type="text" name="username" id="username">
                @error('username')   
                <p class="text-red-500 text-base">{{ $message }}</p>
                @enderror
            </div>
            <div class="row mt-2 flex flex-col gap-1 w-full">
                <label for="password" class="@error('password') text-red-500 @enderror">Password</label>
                <input required autocomplete="off" class="bg-[rgba(255,255,255,.2)] w-full py-2 px-2.5 outline-none rounded border border-neutral-500 @error('password') border-red-500 @enderror" type="password" name="password" id="password">
                @error('password')   
                <p class="text-red-500 text-base">{{ $message }}</p>
                @enderror
            </div>
            <div class="row mt-2 flex flex-col justify-center items-end gap-2 w-full">
                <a href="/login" class="text-lg underline text-blue-500">login</a>
                <button type="submit" name="register_submit" class="rounded w-full border border-neutral-500 bg-blue-500 py-2 hover:bg-[#428bff]">Register</button>
            </div>
        </form>
        
    </div>
@endsection