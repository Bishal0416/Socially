<x-app-layout>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const like = (postid) => {

            let text = document.getElementById(postid)
            let count = document.getElementById("count-" + postid)
            const sub = () => {
                text.innerText = "🤍";
                axios.get(`/post/like/remove/${postid}`).then(res => {
                    console.log(res)
                    count.innerText = (parseInt(count.innerText) - 1).toString() + " people liked";
                })
            }
            const add = () => {
                text.innerText = "❤️";
                axios.get(`/post/like/add/${postid}`).then(res => {
                    console.log(res)
                    count.innerText = (parseInt(count.innerText) + 1).toString() + " people liked";
                })

            }
            text.innerText == "❤️" ? sub() : add()
        }
    </script>


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
            <div class="right bg-gray-800 min-h-[100px] sm:col-span-4">


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    All profiles
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Follow</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($userexceptfollows as $users)
                                        @if((!($users->name == $user->name)) )                                
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $users->name }}
                                            </th>
                                            <td class="px-6 py-4 text-right">
                                                <a href="/follower/add/{{$users->id}}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Follow</a>
                                            </td>
                                        </tr>
                                    @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>



            <!-- middle post portion -->
            <div class="flex flex-col middle bg-gray-800 pl-10 min-h-[100px] sm:col-span-4">
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

                        <div>

                            <!-- ❤️ 🤍 -->
                            <!-- Blade Template -->
                            @auth
                            <button id="" onclick="like({{$post->post_id}})">
                                <span class="heart" id="{{$post->post_id}}">🤍</span>
                            </button>
                            <p id="count-{{$post->post_id}}">{{$post->like_count}}</p>
                            @foreach($likes as $like)
                            @if($like['post_id']==$post->post_id)
                            <script>
                                document.getElementById("{{$post->post_id}}").innerText = "❤️"
                            </script>
                            @endif
                            @endforeach
                            @endauth

                        </div>

                        @auth
                        @if($user->id == $post->user_id)
                        <div class=" m-3 grid gap-2 sm:grid-cols-2">
                            <x-danger-button class="ml-3"> Delete Post </x-danger-button>
                            <x-secondary-button class="ml-3"> Edit Post </x-secondary-button>
                        </div>
                        @endif
                        @endauth
                    </div>
                </div>
                @endforeach
                @endisset
            </div>


            <!-- left side -->
            <div class="left bg-gray-800 min-h-[100px] sm:col-span-4">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Yours friend list
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <span class="sr-only">Add</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>                            
                            @foreach($follows as $users)                               
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $users->name }}
                                </th>
                                <td class="px-6 py-4 text-right">
                                    <a href="/follower/remove/{{$users->id}}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Remove</a>
                                </td>
                            </tr>
                @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





</x-app-layout>