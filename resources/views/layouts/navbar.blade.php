<div id="navbar" class="navbar top-0 left-0 w-full flex items-center z-10">
  <div class="navbar-start">
    {{-- Menu Dropdown (Responsive) --}}
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </label>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
        Admin
        <li><a class="hover:text-primary">Pelajaran</a></li>
        <li><a class="hover:text-primary">Guru</a></li>
        <li><a class="hover:text-primary">Siswa</a></li>
        <li><a class="hover:text-primary">Diskusi</a></li>
      </ul>
    </div>
    {{-- END Menu Dropdown (Responsive) --}}
    <a>
      <img src="/img/logo.svg" alt="creatilearn" class="w-32 lg:w-32">
    </a>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      @if (auth()->user()->type == 'admin')
        {{-- Admin --}}
        <li><a href="/dashboard/courses" class="hover:text-primary">Data Pelajaran</a></li>
        <li><a href="/dashboard/teachers" class="hover:text-primary">Data Guru</a></li>
      @endif
      @if (auth()->user()->type == 'teacher')
        <li><a href="/course-list" class="hover:text-primary">Daftar Pelajaran</a></li>
        <li><a href="/dashboard/questions" class="hover:text-primary">Data Soal</a></li>
        <li><a href="/dashboard/students" class="hover:text-primary">Data Siswa</a></li>
        <li><a href="/dashboard/student-result" class="hover:text-primary">Data Nilai Siswa</a></li>
        <li><a href="/dashboard/student-group" class="hover:text-primary">Diskusi</a></li>
      @endif
      @if (auth()->user()->type == 'student')
        <li><a href="/courses" class="hover:text-primary">Beranda</a></li>
        {{-- <li><a href="/results" class="hover:text-primary">Hasil Belajar</a></li> --}}
      @endif
    </ul>
  </div>
  <div class="navbar-end">
    <div class="dropdown dropdown-end">
      <label tabindex="0" class="btn btn-ghost btn-circle avatar">
        <div class="w-10 rounded-full">
          <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}" />
        </div>
      </label>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-3 shadow bg-base-100 rounded-box w-52">
        <li><a href="/profile/{{ auth()->user()->username }}" class="text-sm md:text-base">Profil</a></li>
        <li>
          <form action="/logout" method="POST" class="mt-1 -mb-[0.375] ">
            @csrf
            <button type="submit" class="text-sm md:text-base">Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>

