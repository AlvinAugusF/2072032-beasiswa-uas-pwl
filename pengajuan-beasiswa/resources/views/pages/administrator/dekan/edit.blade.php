@extends('layout.main')
@section('title','Administrator - Edit Mahasiswa')
@section('content')
<div class="text-center mt-3">
    <h1>Edit akun mahasiswa</h1>
</div>
<div class="d-flex justify-content-center my-4">
    <form accept="{{route('editMahasiswa',$data->id)}}" enctype="multipart/form-data" method="POST" class="px-5 py-4 w-50" style="border-radius: 4px;box-shadow: 0 0 20px; background-color: #f4f6f9">
        @csrf
        @method('PUT')
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" name="name" value="{{old('name') ? old('name') : $data->user->name}}" placeholder="Enter Name">
            @error('name')
            <p class="text-danger mb-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email" value="{{old('email') ? old('email') : $data->user->email}}" placeholder="Enter Email">
            @error('email')
                <p class="text-danger mb-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
            @error('password')
                <p class="text-danger mb-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Jenis Kelamin</label>
            <select class="form-select" name="gender">
                @php
                    $selected = false;
                    if (old('gender')) {
                        if(old ('gender')== "Laki-laki"){
                            $selected = true;
                        }
                    } else if ($data->user->gender == "Laki-laki"){
                        $selected = true;
                    }
                @endphp
                <option value="Laki-laki" {{$selected ? "selected" : ""}}>Laki-laki</option>
                <option value="Perempuan" {{$selected ? "" : "selected"}}>Perempuan</option>
            </select>
            @error('gender')
                <p class="text-danger mb-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Ketua/Wakil Ketua</label>
            <select class="form-select" name="status">
                @php
                    $selected = false;
                    if (old('status')) {
                        if(old ('status')== "Ketua"){
                            $selected = true;
                        }
                    } else if ($data->status == "Ketua"){
                        $selected = true;
                    }
                @endphp
                <option value="Ketua" {{$selected ? "selected" : ""}}>Ketua</option>
                <option value="Wakil Ketua" {{$selected ? "" : "selected"}}>Wakil Ketua</option>
            </select>
            @error('status')
                <p class="text-danger mb-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="text" class="form-control" name="phone_number" value="{{old('phone_number') ? old('phone_number') : $data->user->phone_number}}" placeholder="Enter Name">
            @error('phone_number')
                <p class="text-danger mb-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group my-3">
            <label for="exampleInputEmail1">Fakultas</label>
            <select class="form-select" name="fakultas">
                @foreach ($fakultas as $value)
                    @php
                        $selected = false;
                        if (old('fakultas')) {
                            if(old ('fakultas')== $value->id){
                                $selected = true;
                            }
                        } else if ($value->id == $data->fakultas_id){
                            $selected = true;
                        }
                    @endphp
                    <option value={{$value->id}} {{$selected ? "selected" : ""}}>{{$value->name}}</option>
                @endforeach
            </select>
            @error('fakultas')
                <p class="text-danger mb-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group text-center mt-4 mb-0">
            <button type="submit" class="btn btn-primary w-50">Edit Akun</button>
        </div>
    </form>
</div>
  
@endsection