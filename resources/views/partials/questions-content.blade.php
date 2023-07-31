<div class="container mx-auto mb-10">
    <div class="border rounded-lg shadow-lg p-4 text-sm relative bg-base-100 m-4 md:text-base md:p-6">
        <form action="">
            @foreach ($quizes as $quiz)
              <fieldset>
                <legend class="text-sm font-semibold leading-6 text-gray-900">Soal {{ $quiz->number }}</legend>
                <p class="mt-1 text-sm leading-6 text-gray-900">{{ $quiz->question }}</p>
                <div class="mt-6 space-y-4">
                  <div class="flex items-center gap-x-3">
                    <input id="a" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="a" class="block text-sm font-medium leading-6 text-gray-900">{{ $quiz->option_a }}</label>
                  </div>
                  <div class="flex items-center gap-x-3">
                    <input id="b" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="b" class="block text-sm font-medium leading-6 text-gray-900">{{ $quiz->option_b }}</label>
                  </div>
                  <div class="flex items-center gap-x-3">
                    <input id="c" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="c" class="block text-sm font-medium leading-6 text-gray-900">{{ $quiz->option_c }}</label>
                  </div>
                  <div class="flex items-center gap-x-3">
                    <input id="d" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="d" class="block text-sm font-medium leading-6 text-gray-900">{{ $quiz->option_d }}</label>
                  </div>
                  <div class="flex items-center gap-x-3">
                    <input id="e" name="push-notifications" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    <label for="e" class="block text-sm font-medium leading-6 text-gray-900">{{ $quiz->option_e }}</label>
                  </div>
                </div>
              </fieldset>
            @endforeach
        </form>
        <div class="flex place-content-end mt-4">
            <div class="join grid grid-cols-2">
                <button class="join-item btn btn-outline text-xs md:text-base">Sebelumnya</button>
                <button class="join-item btn btn-outline text-xs md:text-base">Selanjutnya</button>
            </div>
        </div>
    </div>
</div>