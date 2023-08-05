@extends('layouts.app')

@section('content')
<div class="container mx-auto mb-10">
  <div class="border rounded-lg shadow-lg p-4 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
    @if ($questions->count())
        <form action="/{{ $subject->slug }}/{{ $questions[0]->code }}" method="POST" class="mx-6 mt-4">
            @csrf
            <input id="subject_id" name="subject_id" type="hidden" value="{{ $subject->id }}">
            <input id="code" name="code" type="hidden" value="{{ $questions[0]->code }}">
            @foreach ($questions as $question)
                <fieldset class="mb-8">
                    <legend class="text-xs md:text-sm font-semibold leading-6 text-gray-900">Soal {{ $loop->iteration }}</legend>
                    @if ($question->img_question)
                        <img src="{{ asset('storage/' . $question->img_question) }}" alt="{{ $question->img_question }}" class="mt-3 h-auto w-auto md:h-48">
                    @endif
                    <p class="mt-1 text-xs md:text-sm leading-6 text-gray-900">{{ $question->question }}</p>
                    <div class="mt-2 space-y-4">
                        <div class="flex items-center gap-x-3">
                            <input id="a_{{ $loop->iteration }}" value="a" name="no{{ $loop->iteration }}" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" required>
                            <label for="a_{{ $loop->iteration }}" class="block text-xs md:text-sm font-medium leading-6 text-gray-900">{{ $question->option_a }}</label>
                        </div>
                        <div class="flex items-center gap-x-3">
                            <input id="b_{{ $loop->iteration }}" value="b" name="no{{ $loop->iteration }}" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            <label for="b_{{ $loop->iteration }}" class="block text-xs md:text-sm font-medium leading-6 text-gray-900">{{ $question->option_b }}</label>
                        </div>
                        <div class="flex items-center gap-x-3">
                            <input id="c_{{ $loop->iteration }}" value="c" name="no{{ $loop->iteration }}" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            <label for="c_{{ $loop->iteration }}" class="block text-xs md:text-sm font-medium leading-6 text-gray-900">{{ $question->option_c }}</label>
                        </div>
                        <div class="flex items-center gap-x-3">
                            <input id="d_{{ $loop->iteration }}" value="d" name="no{{ $loop->iteration }}" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            <label for="d_{{ $loop->iteration }}" class="block text-xs md:text-sm font-medium leading-6 text-gray-900">{{ $question->option_d }}</label>
                        </div>
                        <div class="flex items-center gap-x-3">
                            <input id="e_{{ $loop->iteration }}" value="e" name="no{{ $loop->iteration }}" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                            <label for="e_{{ $loop->iteration }}" class="block text-xs md:text-sm font-medium leading-6 text-gray-900">{{ $question->option_e }}</label>
                        </div>
                    </div>
                </fieldset>
            @endforeach
            <div class="flex mt-6 items-center justify-end">
                <!-- The button to open modal -->
                <label for="my_modal_6" class="btn btn-warning rounded-md text-sm capitalize">Selesai</label>

                <!-- Put this part before </body> tag -->
                <input type="checkbox" id="my_modal_6" class="modal-toggle" />
                <div class="modal modal-bottom sm:modal-middle">
                <div class="modal-box">
                    <h3 class="font-bold">Konfirmasi</h3>
                    <p class="py-4">Apakah Anda yakin akan menyelesaikan ujian?</p>
                    <div class="modal-action">
                    <label for="my_modal_6" class="btn capitalize">Batalkan</label>
                    <a>
                        <button class="btn btn-neutral capitalize" type="submit">Ya</button>
                    </a>
                    </div>
                </div>
                </div>
            </div>
        </form> 
    @else
    <div class="flex items-center justify-center h-screen">
        <p class="text-gray-400 text-sm md:text-base text-center">Belum ada soal ujian pada materi {{ $subject->title }}</p>
    </div>
    @endif
  </div>
</div>
@endsection