<div class="container mx-auto px-6 font-inter sm:flex flex-wrap gap-6 justify-evenly mt-10">
  @foreach ($courses as $course)
    <div class="card rounded-xl shadow-xl overflow-hidden mb-10 bg-base-100 w-64 md:w-80 lg:w-72">
      <div class="card-body">
        <h2 class="card-title text-lg">{{ $course->title }}</h2>
        <p class="text-sm">{{ $course->desc }}</p>
        <div class="card-actions justify-end">
          <a href="/course/{{ $course->slug }}">
            <button id="button-materi" class="btn btn-warning rounded-md text-sm" type="submit" >Lihat</button>
          </a>
        </div>
      </div>
    </div>
  @endforeach
</div>

{{-- <div class="container mx-auto px-6 font-inter sm:flex flex-wrap gap-6 justify-evenly mt-10">
  <div class="rounded-xl shadow-xl overflow-hidden mb-10 bg-base-100 w-64 md:w-80 lg:w-72">
    <div class="card-body">
      <h2 class="card-title text-lg">{{ $courses->title }}</h2>
      <p class="text-sm">{{ $courses->desc }}</p>
      <div class="card-actions justify-end">
        <a href="/detail-materi">
          <button id="button-materi" class="btn btn-warning rounded-md text-sm" type="submit" >Lihat</button>
        </a>
      </div>
    </div>
  </div>
  <div class="rounded-xl shadow-xl overflow-hidden mb-10 bg-base-100 w-64 md:w-80 lg:w-72">
    <div class="card-body">
      <h2 class="card-title text-lg">Judul</h2>
      <p class="text-sm">Deskripsi</p>
      <div class="card-actions justify-end">
        <a href="/detail-materi" onclick="return false;">
          <button id="button-materi" class="btn btn-warning rounded-md text-sm " type="submit" disabled>Lihat</button>
        </a>
      </div>
    </div>
  </div>
  <div class="rounded-xl shadow-xl overflow-hidden mb-10 bg-base-100 w-64 md:w-80 lg:w-72">
    <div class="card-body">
      <h2 class="card-title text-lg">Judul</h2>
      <p class="text-sm">Deskripsi</p>
      <div class="card-actions justify-end">
        <a href="/detail-materi">
          <button id="button-materi" class="btn btn-warning rounded-md text-sm" type="submit">Lihat</button>
        </a>
      </div>
    </div>
  </div>
  <div class="rounded-xl shadow-xl overflow-hidden mb-10 bg-base-100 w-64 md:w-80 lg:w-72">
    <div class="card-body">
      <h2 class="card-title text-lg">Judul</h2>
      <p class="text-sm">Deskripsi</p>
      <div class="card-actions justify-end">
        <a href="/detail-materi">
          <button id="button-materi" class="btn btn-warning rounded-md text-sm" type="submit">Lihat</button>
        </a>
      </div>
    </div>
  </div>
  <div class="rounded-xl shadow-xl overflow-hidden mb-10 bg-base-100 w-64 md:w-80 lg:w-72">
    <div class="card-body">
      <h2 class="card-title text-lg">Judul</h2>
      <p class="text-sm">Deskripsi</p>
      <div class="card-actions justify-end">
        <a href="/detail-materi">
          <button id="button-materi" class="btn btn-warning rounded-md text-sm" type="submit">Lihat</button>
        </a>
      </div>
    </div>
  </div>
</div>

{{-- <div class="contaiter mx-auto px-6 flex flex-wrap gap-6 justify-center">
    <div class="card bg-base-100 shadow-xl m-4 md:w-80 lg:w-96">
        <div class="card-body">
          <h2 class="card-title text-lg">Kelompok </h2>
          <p class="text-sm">Deskripsi materi</p>
          <div class="card-actions justify-end">
            <a href="/detail-materi">
              <button id="button-materi" class="btn btn-warning rounded-md text-sm" type="submit">Lihat Detail</button>
            </a>
          </div>
        </div>
    </div>
    <div class="card bg-base-100 shadow-xl m-4 md:w-80 lg:w-96">
        <div class="card-body">
          <h2 class="card-title text-lg">Judul Materi</h2>
          <p class="text-sm">Deskripsi materi</p>
          <div class="card-actions justify-end">
            <button id="button-materi" class="btn btn-warning rounded-md text-sm" type="submit">Lihat Detail</button>
          </div>
        </div>
    </div>
    <div class="card bg-base-100 shadow-xl m-4 md:w-80 lg:w-96">
        <div class="card-body">
          <h2 class="card-title text-lg">Judul Materi</h2>
          <p class="text-sm">Deskripsi materi</p>
          <div class="card-actions justify-end">
            <button id="button-materi" class="btn btn-warning rounded-md text-sm" type="submit">Lihat Detail</button>
          </div>
        </div>
    </div>
    <div class="card bg-base-100 shadow-xl m-4 md:w-80 lg:w-96">
        <div class="card-body">
          <h2 class="card-title text-lg">Judul Materi</h2>
          <p class="text-sm">Deskripsi materi</p>
          <div class="card-actions justify-end">
            <button id="button-materi" class="btn btn-warning rounded-md text-sm" type="submit">Lihat Detail</button>
          </div>
        </div>
    </div>
</div>  --}} 