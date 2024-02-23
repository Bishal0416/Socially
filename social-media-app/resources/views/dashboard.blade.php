<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <!-- {{ __('dhghvmh') }} -->
            Feeds
        </h2>
    </x-slot>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> -->
    <div class='bg-gray-900'>
        <div class='grid gap-4 m-4 sm:grid-cols-12'>
            <!-- right side -->
            <div class="right bg-gray-800 min-h-[100px] sm:col-span-3">

            </div>

            <!-- middle post portion -->
            <div class="flex flex-col middle bg-gray-800 pl-10 min-h-[100px] sm:col-span-6">
                <div class="m-2">
                    <!-- <a href="#"> -->
                    <x-primary-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-post')">Add
                        Post</x-primary-button>
                    <!-- </a> -->
                    <x-modal name="add-post" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form action="{{ route('post.add') }}" method="POST" class="m-2">
                            @csrf
                            <div class = 'm-2'>
                                <x-input-label for="name" value="Share your feel" />
                                <x-text-input  type="text" class="mt-1 block w-full" value="" autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div class = 'm-2'>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload file</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" type="file">
                                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Lets share tour today's feel</div>
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    Cancel
                                </x-secondary-button>
                
                                <x-danger-button class="ml-3">
                                    Post
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>
                </div>

                <div class="m-2">
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class='p-5'>
                            <a href="#">
                                <img class="rounded-t-lg w-5 h-5" src="/test_photo/pic.jpeg" alt="" />
                            </a>
                        </div>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    Noteworthy
                                    technology acquisitions 2021</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                technology acquisitions of 2021 so far, in reverse chronological order.</p>
                            <a href="#"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- left side -->
            <div class="left bg-gray-800 min-h-[100px] sm:col-span-3"></div>

            <!-- <div class="right bg-orange-400 min-h-[10px] sm:col-span-3"></div>
            <div class="middle bg-slate-50 min-h-[200px] sm:col-span-6"></div>
            <div class="left bg-green-800 min-h-[50px] sm:col-span-3" ></div> -->
        </div>
    </div>




</x-app-layout>