@extends('layouts.app')

@section('greeting')
<a href="/discussion" class="mx-6 mt-4 btn normal-case btn-neutral btn-ghost btn-sm mb-6 md:mb-1 text-xs md:text-sm">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" h-4 w-4 md:h-6 md:w-6">
      <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
    </svg>      
    Kembali ke daftar kelompok</a>
@endsection

@section('content')
<div class="min-h-screen">
    <div class="container mx-auto mb-10">
        <div class="border rounded-lg shadow-lg p-10 relative bg-white m-4">
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolores officia eligendi natus animi distinctio, minima cumque modi odit reprehenderit vel enim cupiditate iure maxime error, culpa assumenda aut rem nostrum facere! Ipsa, eum. Facilis nam similique iusto veritatis amet ipsum, debitis impedit sint. Odit possimus minus est numquam consectetur mollitia eveniet praesentium, provident saepe quo cupiditate velit minima quae nostrum delectus, quam sapiente corrupti voluptates quisquam nam fugiat ipsum sint aperiam. Sunt nulla saepe quasi maxime numquam, enim odit. Vel.</p>
            <hr class="my-6 border-t-2">
            <section class="bg-white dark:bg-gray-900 py-8 lg:py-16">
                <div class="max-w-2xl mx-auto px-4">
                    <div class="flex justify-between items-center mb-6">
                      <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (20)</h2>
                  </div>
                  <form class="mb-6">
                      <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                          <label for="comment" class="sr-only">Your comment</label>
                          <textarea id="comment" rows="6"
                              class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                              placeholder="Write a comment..." required></textarea>
                      </div>
                      <button type="submit"
                          class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                          Post comment
                      </button>
                  </form>
                  <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                      <footer class="flex justify-between items-center mb-2">
                          <div class="flex items-center">
                              <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                                      class="mr-2 w-6 h-6 rounded-full"
                                      src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                      alt="Michael Gough">Michael Gough</p>
                              <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                      title="February 8th, 2022">Feb. 8, 2022</time></p>
                          </div>
                          <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                              class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                              type="button">
                              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                  </path>
                              </svg>
                              <span class="sr-only">Comment settings</span>
                          </button>
                          <!-- Dropdown menu -->
                          <div id="dropdownComment1"
                              class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                              <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                  aria-labelledby="dropdownMenuIconHorizontalButton">
                                  <li>
                                      <a href="#"
                                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                  </li>
                                  <li>
                                      <a href="#"
                                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                  </li>
                                  <li>
                                      <a href="#"
                                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                  </li>
                              </ul>
                          </div>
                      </footer>
                      <p class="text-gray-500 dark:text-gray-400">Very straight-to-point article. Really worth time reading. Thank you! But tools are just the
                          instruments for the UX designers. The knowledge of the design tools are as important as the
                          creation of the design strategy.</p>
                      <div class="flex items-center mt-4 space-x-4">
                          <button type="button"
                              class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                              <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                              Reply
                          </button>
                      </div>
                  </article>
                  <article class="p-6 mb-6 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">
                      <footer class="flex justify-between items-center mb-2">
                          <div class="flex items-center">
                              <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                                      class="mr-2 w-6 h-6 rounded-full"
                                      src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                      alt="Jese Leos">Jese Leos</p>
                              <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-12"
                                      title="February 12th, 2022">Feb. 12, 2022</time></p>
                          </div>
                          <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"
                              class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                              type="button">
                              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                  </path>
                              </svg>
                              <span class="sr-only">Comment settings</span>
                          </button>
                          <!-- Dropdown menu -->
                          <div id="dropdownComment2"
                              class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                              <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                  aria-labelledby="dropdownMenuIconHorizontalButton">
                                  <li>
                                      <a href="#"
                                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                  </li>
                                  <li>
                                      <a href="#"
                                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                  </li>
                                  <li>
                                      <a href="#"
                                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                  </li>
                              </ul>
                          </div>
                      </footer>
                      <p class="text-gray-500 dark:text-gray-400">Much appreciated! Glad you liked it ☺️</p>
                      <div class="flex items-center mt-4 space-x-4">
                          <button type="button"
                              class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                              <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                              Reply
                          </button>
                      </div>
                  </article>
                  <article class="p-6 mb-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                      <footer class="flex justify-between items-center mb-2">
                          <div class="flex items-center">
                              <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                                      class="mr-2 w-6 h-6 rounded-full"
                                      src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"
                                      alt="Bonnie Green">Bonnie Green</p>
                              <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-03-12"
                                      title="March 12th, 2022">Mar. 12, 2022</time></p>
                          </div>
                          <button id="dropdownComment3Button" data-dropdown-toggle="dropdownComment3"
                              class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                              type="button">
                              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                  </path>
                              </svg>
                              <span class="sr-only">Comment settings</span>
                          </button>
                          <!-- Dropdown menu -->
                          <div id="dropdownComment3"
                              class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                              <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                  aria-labelledby="dropdownMenuIconHorizontalButton">
                                  <li>
                                      <a href="#"
                                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                  </li>
                                  <li>
                                      <a href="#"
                                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                  </li>
                                  <li>
                                      <a href="#"
                                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                  </li>
                              </ul>
                          </div>
                      </footer>
                      <p class="text-gray-500 dark:text-gray-400">The article covers the essentials, challenges, myths and stages the UX designer should consider while creating the design strategy.</p>
                      <div class="flex items-center mt-4 space-x-4">
                          <button type="button"
                              class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                              <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                              Reply
                          </button>
                      </div>
                  </article>
                  <article class="p-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                      <footer class="flex justify-between items-center mb-2">
                          <div class="flex items-center">
                              <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                                      class="mr-2 w-6 h-6 rounded-full"
                                      src="https://flowbite.com/docs/images/people/profile-picture-4.jpg"
                                      alt="Helene Engels">Helene Engels</p>
                              <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-06-23"
                                      title="June 23rd, 2022">Jun. 23, 2022</time></p>
                          </div>
                          <button id="dropdownComment4Button" data-dropdown-toggle="dropdownComment4"
                              class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                              type="button">
                              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                  xmlns="http://www.w3.org/2000/svg">
                                  <path
                                      d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                  </path>
                              </svg>
                          </button>
                          <!-- Dropdown menu -->
                          <div id="dropdownComment4"
                              class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                              <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                  aria-labelledby="dropdownMenuIconHorizontalButton">
                                  <li>
                                      <a href="#"
                                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                  </li>
                                  <li>
                                      <a href="#"
                                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                  </li>
                                  <li>
                                      <a href="#"
                                          class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                                  </li>
                              </ul>
                          </div>
                      </footer>
                      <p class="text-gray-500 dark:text-gray-400">Thanks for sharing this. I do came from the Backend development and explored some of the tools to design my Side Projects.</p>
                      <div class="flex items-center mt-4 space-x-4">
                          <button type="button"
                              class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                              <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                              Reply
                          </button>
                      </div>
                  </article>
                </div>
              </section>
            {{-- <section class="mt-6">
                <form action="">
                    <div class="form-control">
                        <label class="label">
                          <span class="label-text font-semibold text-sm md:text-base">Berikan Jawaban</span>
                        </label>
                        <textarea class="textarea textarea-bordered h-24" required placeholder="Tulis jawabanmu.."></textarea>
                        <div class="flex mt-4 justify-end">
                            <button class="btn btn-warning rounded-md text-sm capitalize" type="submit">Kirim</button>
                        </div>
                    </div>
                </form>
                <div>
                    <div class="flex relative flex-col rounded-2xl bg-base-100 border p-0 mb-2">
                        <div class="flex flex-col w-full lg:flex-row p-4 mb-2">
                            <div class="grid flex-grow w-3/4 h-auto card rounded-box place-items-start">
                                <div class="flex items-center  justify-center gap-2">
                                    <label tabindex="0" class="avatar">
                                        <div class="w-10 rounded-full">
                                          <img src="https://ui-avatars.com/api/" />
                                        </div>
                                    </label>
                                    <h2 class="text-sm font-semibold md:text-base 12">Nama</h2>
                                </div>
                                <p class="text-xs md:text-sm mt-2">If a dog chews shoes whose shoes does he choose?</p>
                            </div> 
                            <div class="divider lg:divider-horizontal"></div> 
                            <div class="grid flex-grow w-1/4 h-auto card rounded-box place-items-center">
                                <div class="join join-vertical lg:join-horizontal w-auto">
                                    <button class="btn join-item">👍</button>
                                    <div class="border rounded-none w-10 flex relative items-center">
                                        <span class="mx-auto">0</span>
                                    </div>
                                    <button class="btn join-item">👎</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex relative flex-col rounded-2xl bg-base-100 border p-0 mb-2">
                        <div class="flex flex-col w-full lg:flex-row p-4 mb-2">
                            <div class="grid flex-grow w-3/4 h-auto card rounded-box place-items-start">
                                <h2 class="items-center text-sm font-semibold md:text-base border-b border-gray-200">Rachma</h2>
                                <p class="text-xs md:text-sm mt-2">If a dog chews shoes whose shoes does he choose?</p>
                            </div> 
                            <div class="divider lg:divider-horizontal"></div> 
                            <div class="grid flex-grow w-1/4 h-auto card rounded-box place-items-center">
                                <div class="join join-vertical lg:join-horizontal w-auto">
                                    <button class="btn join-item">👍</button>
                                    <div class="border rounded-none w-10 flex relative items-center">
                                        <span class="mx-auto">0</span>
                                    </div>
                                    <button class="btn join-item">👎</button>
                                </div>
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="flex justify-end mt-4">
                    <input type="file" class="file-input text-base file-input-bordered w-full max-w-sm"  />
                </div>
            </section> --}}
        </div>
    </div>
</div>
@endsection