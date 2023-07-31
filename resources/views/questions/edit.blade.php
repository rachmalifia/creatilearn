@extends('layouts.app')

@section('content')
<div class="container mx-auto mb-10">
    <div class="border rounded-lg p-2 text-sm relative bg-base-100 m-4 md:text-base md:p-6 min-h-screen">
        <div class="flex flex-wrap md:flex-nowrap pt-3 pb-2 mb-2 border-b-2">
            <h1 class="font-semibold mx-auto">Ubah data soal</span></h1>
        </div>
        
        <form class="mt-4 px-3" method="POST" action="/questions/{{ $subject->slug }}/{{ $question->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div>
                <div class="mt-4 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <input id="subject_id" name="subject_id" type="hidden" value="{{ $subject->id}}">
                    <div class="sm:col-span-4">
                        <label for="code" class="block text-sm font-medium leading-6 label-text text-gray-900">Jenis Soal <span class="text-xs font-semibold">pastikan jenis soal sesuai dengan yang diinginkan</span>
                        </label>
                        <div class="mt-2">
                            <select name="code" id="code" class="form-control block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                                @foreach ($codes as $code)
                                    @if (old('code', $question->code) == $code['key'])
                                        <option value="{{ $code['key'] }}" selected>{{ $code['name'] }}</option>
                                    @else 
                                        <option value="{{ $code['key'] }}">{{ $code['name'] }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="img_question" class="block text-sm font-medium leading-6 text-gray-900">Gambar untuk soal <span class="text-xs">opsional</span></label>
                        @if ($question->img_question)
                            <img src="{{ asset('storage/' . $question->img_question) }}" class="img-preview mb-3 w-3/12 h-auto">
                        @else
                            <img class="img-preview mb-3 w-3/12 h-auto">
                        @endif
                        <div class="mt-2">
                            <input id="img_question" name="img_question" type="file" class="form-control w-full file-input file-input-bordered file-input-xs md:file-input-md  @error('img_question') input-error @enderror" onchange="previewImage()" />
                            @error('img_question')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                        {{ $message }}
                                    </p>
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="question" class="block text-sm font-medium leading-6 text-gray-900">Pertanyaan</label>
                        <div class="mt-2">
                            <textarea id="question" name="question" rows="3" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="Pertanyaan">{{ old('question', $question->question) }}
                            </textarea>
                            @error('question')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                        {{ $message }}
                                    </p>                      
                                </div>
                            @enderror
                        </div>
                    </div>
                
                    <div class="sm:col-span-4">
                        <label for="option_a" class="block text-sm font-medium leading-6 text-gray-900">Opsi A</label>
                        <div class="mt-2">
                            <input type="text" name="option_a" id="option_a" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="Opsi A"  value="{{ old('option_a', $question->option_a) }}">
                            @error('option_a')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                            {{ $message }}
                                    </p>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="option_b" class="block text-sm font-medium leading-6 text-gray-900">Opsi B</label>
                        <div class="mt-2">
                            <input type="text" name="option_b" id="option_b" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="Opsi B" value="{{ old('option_b', $question->option_b ) }}">
                            @error('option_b')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                            {{ $message }}
                                    </p>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="option_c" class="block text-sm font-medium leading-6 text-gray-900">Opsi C</label>
                        <div class="mt-2">
                            <input type="text" name="option_c" id="option_c" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="Opsi C" value="{{ old('option_c', $question->option_c ) }}">
                            @error('option_c')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                            {{ $message }}
                                    </p> 
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="option_d" class="block text-sm font-medium leading-6 text-gray-900">Opsi C</label>
                        <div class="mt-2">
                            <input type="text" name="option_d" id="option_d" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="Opsi D" value="{{ old('option_d', $question->option_d )}}">
                            @error('option_d')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                            {{ $message }}
                                    </p>                      
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="option_e" class="block text-sm font-medium leading-6 text-gray-900">Opsi E</label>
                        <div class="mt-2">
                            <input type="text" name="option_e" id="option_e" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="Opsi E" value="{{ old('option_e',$question->option_e) }}">
                            @error('option_e')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                            {{ $message }}
                                    </p>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="answer_key" class="block text-sm font-medium leading-6 text-gray-900">
                            <span class="label-text">Kunci Jawaban</span>
                        </label>
                        <select name="answer_key" id="answer_key" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6">
                            @foreach ($answer_keys as $answer_key)
                                @if (old('answer_key', $question->answer_key) == $answer_key['key'])
                                    <option value="{{ $answer_key['key'] }}" selected>{{ $answer_key['name'] }}</option>
                                @else 
                                    <option value="{{ $answer_key['key'] }}">{{ $answer_key['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="point" class="block text-sm font-medium leading-6 text-gray-900">Poin Soal</label>
                        <div class="mt-2">
                            <input type="number" name="point" id="point" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:outline-none  focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6" required placeholder="10" value="{{ old('point', $question->point) }}">
                            @error('point')
                                <div>
                                    <p class="text-red-500 text-sm m-1">
                                            {{ $message }}
                                    </p>                      
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="mt-6 flex items-center justify-start">
              <button type="submit" class="rounded-md bg-primary px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-primary-hover focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary">Ubah</button>
            </div>
        </form>
    </div>
</div>
<script>
    function previewImage() {
        const img_question = document.querySelector('#img_question');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(img_question.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection
