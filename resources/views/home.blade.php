@extends('partials.main')

@section('container')

    @include('partials.alert')

    <div class="add-container text-white fixed top-0 w-screen h-screen bg-[rgba(0,0,0,.5)] backdrop-blur-md transition-all ease-linear duration-300 transform -translate-y-full ">
        <form action="/" method="POST" class="mt-10 mx-auto w-[95%] sm:w-[60%] md:w-[50%] lg:w-[40%] xl:w-[30%] p-2 border border-neutral-600 text-xl shadow-2xl rounded bg-[rgba(255,255,255,.1)]">
            @csrf
            <h1 class="text-3xl text-center font-medium">Tambah Murid</h1>
            <div class="row mt-4 flex flex-col gap-1 w-full">
                <label for="nama" class="@error('nama') text-red-500 @enderror">Nama</label>
                <input required autocomplete="off" class="input-tambah bg-[rgba(255,255,255,.2)] w-full py-2 px-2.5 outline-none rounded border border-neutral-500 @error('nama') border-red-500 @enderror" type="text" name="nama" id="nama">
                @error('nama')   
                <p class="text-red-500 text-md">{{ $message }}</p>
                @enderror
            </div>
            <div class="row mt-2 flex flex-col gap-1 w-full">
                <label for="umur" class="@error('umur') text-red-500 @enderror">Umur</label>
                <input required autocomplete="off" class="input-tambah bg-[rgba(255,255,255,.2)] w-full py-2 px-2.5 outline-none rounded border border-neutral-500 @error('umur') border-red-500 @enderror" type="number" min="0" name="umur" id="umur">
                @error('umur')   
                <p class="text-red-500 text-md">{{ $message }}</p>
                @enderror
            </div>
            <div class="row mt-2 flex flex-col gap-1 w-full">
                <label for="gender" class="@error('gender') text-red-500 @enderror">Gender</label>
                <select required name="gender" id="gender" class="select-tambah bg-[rgba(255,255,255,.2)] w-full py-2 px-2.5 outline-none rounded border border-neutral-500 @error('password') text-red-500 @enderror">
                    <option class="text-black" value="Laki-Laki">Laki-Laki</option>
                    <option class="text-black" value="Perempuan">Perempuan</option>
                </select>
                @error('gender')   
                <p class="text-red-500 text-md">{{ $message }}</p>
                @enderror
            </div>
            <div class="row mt-5 flex flex-col justify-center gap-4 w-full">
                <button type="submit" name="tambah_submit" class="rounded w-full border border-neutral-500 bg-blue-500 py-2 hover:bg-[#428bff]">Tambah</button>
                <button type="button" class="button-batal rounded w-full border border-neutral-500 bg-red-500 py-2 hover:bg-red-600">Batal</button>
            </div>
        </form>
    </div>

    <div class="text-[rgb(240,240,240)] w-screen h-screen overflow-auto bg-cover bg-no-repeat px-2 py-4 sm:px-4" style="background-image: url({{ asset('img/bg-utama.jpg') }})">

        <div class="buttons-container flex justify-between">
            <button class="add-button border border-neutral-500 w-32 rounded-sm bg-blue-500 py-2">Tambah Murid</button>
            <form action="/logout" method="POST">   
                @csrf
                <button type="submit" name="logout_submit" class="border border-neutral-500 w-32 rounded-sm bg-red-500 py-2"">Logout</button>
            </form>
        </div>
        <div class="murid-container grid grid-cols-1 mt-5 gap-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">

            @if (count($murids) < 1)    
                <p class="text-center">Data Murid Kosong</p>
            @else
                @foreach ($murids as $murid) 
                    <div class="row border border-neutral-500 rounded-sm p-2 bg-[rgba(255,255,255,.1)]">
                        <div class="nama">
                            <span class="inline-block w-14">Nama</span>
                            <span class="mr-1">:</span>
                            <span>{{ $murid->nama }}</span>
                        </div>
                        <div class="umur">
                            <span class="inline-block w-14">Umur</span>
                            <span class="mr-1">:</span>
                            <span>{{ $murid->umur }}</span>
                        </div>
                        <div class="gender">
                            <span class="inline-block w-14">Gender</span>
                            <span class="mr-1">:</span>
                            <span>{{ $murid->gender }}</span>
                        </div>
                        <div class="button flex mt-2 gap-2">
                            <a href="/edit?id={{ $murid->id }}" class="border border-neutral-600 w-full text-center py-1 rounded-sm bg-green-500">Edit</a>
                            <form action="/" method="POST" class="w-full">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $murid->id }}">
                                <button type="submit" name="delete_submit" class="border border-neutral-600 w-full py-1 rounded-sm bg-red-500">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
    

    <script>
        $(document).ready(function () {
            $('.add-button').click(function (e) {
                $('.add-container').removeClass('-translate-y-full');
            });
            $('.button-batal').click(function (e) {
                $('.add-container').addClass('-translate-y-full');
                $('.input-tambah').each(function (index, input) { 
                    $(input).val('');
                });
                $('.select-tambah').val('Laki-Laki');
            });
        });
    </script>
@endsection