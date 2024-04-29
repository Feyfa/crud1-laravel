@extends('partials.main')

@section('container')
<div class="text-[rgb(240,240,240)] w-screen h-screen flex justify-center items-center bg-cover bg-no-repeat" style="background-image: url({{ asset('img/bg-utama.jpg') }})">
    @include('partials.alert')
    
    <form action="/" method="POST" class="w-[95%] sm:w-[60%] md:w-[50%] lg:w-[40%] xl:w-[30%] p-2 border border-neutral-600 text-xl shadow-2xl rounded bg-[rgba(255,255,255,.1)]">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $murid->id }}">

        <h1 class="text-3xl text-center font-medium">Edit Murid</h1>
        <div class="row mt-4 flex flex-col gap-1 w-full">
            <label for="nama" class="@error('nama') text-red-500 @enderror">Nama</label>
            <input autocomplete="off" class="bg-[rgba(255,255,255,.2)] w-full py-2 px-2.5 outline-none rounded border border-neutral-500 @error('nama') text-red-500 @enderror" type="text" name="nama" id="nama" value="{{ $murid->nama }}">
            @error('nama')   
            <p class="text-red-500 text-md">{{ $message }}</p>
            @enderror
        </div>
        <div class="row mt-2 flex flex-col gap-1 w-full">
            <label for="umur" class="@error('umur') text-red-500 @enderror">umur</label>
            <input autocomplete="off" class="bg-[rgba(255,255,255,.2)] w-full py-2 px-2.5 outline-none rounded border border-neutral-500 @error('umur') text-red-500 @enderror" type="number" name="umur" id="umur" min="0" value="{{ $murid->umur }}">
            @error('umur')   
            <p class="text-red-500 text-md">{{ $message }}</p>
            @enderror
        </div>
        <div class="row mt-2 flex flex-col gap-1 w-full">
            <label for="gender" class="@error('gender') text-red-500 @enderror">Gender</label>
            <select name="gender" id="gender" class="bg-[rgba(255,255,255,.2)] w-full py-2 px-2.5 outline-none rounded border border-neutral-500 @error('password') text-red-500 @enderror">
                <option class="text-black" value="Laki-Laki" {{ $murid->gender === 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                <option class="text-black" value="Perempuan" {{ $murid->gender === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('gender')   
            <p class="text-red-500 text-md">{{ $message }}</p>
            @enderror
        </div>
        <div class="row mt-8 flex flex-col gap-3 w-full">
            <button type="submit" name="update_submit" class="rounded w-full border border-neutral-500 bg-blue-500 py-2 hover:bg-[#428bff]">Edit</button>
            <a href="/register" class="rounded w-full border border-neutral-500 bg-red-500 py-2 hover:bg-red-600 text-center">Batal</a>
        </div>
    </form>
    
</div>
@endsection