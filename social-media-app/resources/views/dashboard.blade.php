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
                        <form action="{{ route('post.add') }}" method="POST" class="m-2" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class='m-2'>
                                <x-input-label for="name" value="Share your feel" />
                                <x-text-input type="text" name="post_text" class="mt-1 block w-full" value="" id="name"
                                    autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('post_text')" />
                            </div>
                            <div class='m-2'>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="file">Upload file</label>
                                <input id="file" name="post_img"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    aria-describedby="user_avatar_help" type="file">
                                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Lets
                                    share tour today's feel</div>
                                <x-input-error class="mt-2" :messages="$errors->get('post_img')" />
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


                @isset($allPosts)
                @foreach($allPosts as $post)
                <div class="m-2">
                    {{$post->post_id}}
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <div class="pt-5 pl-5 pr-5">
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$post->postText}}</p>
                        </div>
                        <div class='p-5'>
                            <img height=200 width=500 class="" src="{{ asset('storage/'.$post->postImg) }} " alt="" />
                        </div>

                        @auth
                        <div class=" m-3 grid gap-2 sm:grid-cols-2">
                            <x-danger-button class="ml-3"> Delete Post </x-danger-button>
                            <x-secondary-button class="ml-3"> Edit Post </x-secondary-button>
                        </div>
                        @endauth
                    </div>
                </div>
                @endforeach
                @endisset
            </div>


            <!-- left side -->
            <div class="left bg-gray-800 min-h-[100px] sm:col-span-3"></div>

            <!-- <div class="right bg-orange-400 min-h-[10px] sm:col-span-3"></div>
            <div class="middle bg-slate-50 min-h-[200px] sm:col-span-6"></div>
            <div class="left bg-green-800 min-h-[50px] sm:col-span-3" ></div> -->
        </div>
    </div>




</x-app-layout>