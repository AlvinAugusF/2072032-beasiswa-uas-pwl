<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <div class="d-flex flex-column align-items-center  text-white text-decoration-none">
      <span class="fs-4">Halo, {{auth()->user()->name}}</span>
      <span class="fs-10">Akun {{auth()->user()->getRole->name}} </span>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        @if (auth()->user()->role_id == 1)
        <li class="nav-item">
            <a href="{{route('listMahasiswa')}}" class="nav-link {{Str::contains(url()->current(), 'mahasiswa') ? "active" : "text-white"}}" aria-current="page">
              Akun Mahasiswa
            </a>
        </li>
        <li>
            <a href="{{route('listDekan')}}" class="nav-link {{Str::contains(url()->current(), 'dekan') ? "active" : "text-white"}}">
              Akun Dekan
            </a>
        </li>
        <li>
            <a href="{{route('listPStudi')}}" class="nav-link {{Str::contains(url()->current(), 'program-studi') ? "active" : "text-white"}}">
              Akun Program Studi
            </a>
        </li>
        <li>
            <a href="{{route('listPeriod')}}" class="nav-link {{Str::contains(url()->current(), 'period') ? "active" : "text-white"}}">
              Periode
            </a>
        </li>
        <li>
            <a href="{{route('listFakultas')}}" class="nav-link {{Str::contains(url()->current(), 'fakultas') ? "active" : "text-white"}}">
              Fakultas
            </a>
        </li>
        <li>
            <a href="{{route('listJurusan')}}" class="nav-link {{Str::contains(url()->current(), 'jurusan') ? "active" : "text-white"}}">
              Jurusan
            </a>
        </li>
        <li>
            <a href="{{route('listBeasiswa')}}" class="nav-link {{Str::contains(url()->current(), 'beasiswa') ? "active" : "text-white"}}">
              Beasiswa
            </a>
        </li>
        @else
            
        @endif
      
    </ul>
    <hr>
    <div class="text-center">
        <a href="{{route('logout')}}" class="text-white text-decoration-none"><strong>Logout</strong></a>
    </div>
  </div>