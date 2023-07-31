@extends('layouts.app')
@include('layouts.navbar')
@section('content')
<div class="p-4 relative m-4">
    <div class="flex flex-col w-full border-opacity-50">
        <div class="grid h-auto card bg-base-300 rounded-box place-content-start">
            <div class="px-1 pt-2 md:p-4">
                <div class="px-4 sm:px-0">
                  <h3 class="text-sm font-semibold leading-7 text-gray-900 md:text-base">Profil</h3>
                  <p class="mt-1 max-w-2xl text-xs leading-6 text-gray-500 md:text-sm">Informasi Pengguna</p>
                </div>
                <div class="mt-6 border-t border-gray-100">
                  <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                      <dt class="text-xs font-medium leading-6 text-gray-900 md:text-sm">Nama</dt>
                      <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 md:text-sm">Margot Foster</dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                      <dt class="text-xs font-medium leading-6 text-gray-900 md:text-sm">Email address</dt>
                      <dd class="mt-1 text-xs leading-6 text-gray-700 sm:col-span-2 sm:mt-0 md:text-sm">margotfoster@example.com</dd>
                    </div>
                  </dl>
                </div>
            </div> 
        </div>
        <div class="divider"></div>
        <div class="grid h-auto card bg-base-300 rounded-box place-items-center">
            <div class="mt-4 px-4 border-b-2 border-gray-100 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-900">Hasil Kuis dan Ujian</h3>
            </div>
            <div class="overflow-x-auto p-6"> 
                <table class="table table-auto">
                  <!-- head -->
                  <thead>
                    <tr>
                      <th></th>
                      <th>Materi</th>
                      <th>Ujian Awal</th>
                      <th>Kuis</th>
                      <th>Ujian Akhir</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- row 1 -->
                    <tr>
                      <th>1</th>
                      <td>Cy Ganderton</td>
                      <td>100</td>
                      <td>Blue</td>
                      <td>Blue</td>
                    </tr>
                    <!-- row 2 -->
                    <tr>
                      <th>2</th>
                      <td>Hart Hagerty</td>
                      <td>90</td>
                      <td>Purple</td>
                      <td>Blue</td>
                    </tr>
                    <!-- row 3 -->
                    <tr>
                      <th>3</th>
                      <td>Brice Swyre</td>
                      <td>100</td>
                      <td>Red</td>
                      <td>Blue</td>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
      </div>
</div> 
@endsection