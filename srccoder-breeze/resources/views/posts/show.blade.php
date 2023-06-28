
{{-- components directory layout.blade.php way --}}

<x-layout>
        <section class="px-6 py-8">

            <main class="max-w-6xl mx-auto mt-10 space-y-6 lg:mt-20">
                <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                    <div class="col-span-4 mb-10 lg:text-center lg:pt-14">
                        <img src="/images/Source-code-icon.svg" alt="" class="rounded-xl">

                        <p class="block mt-4 text-xs text-gray-400">
                            Published <time>{{$post->created_at->diffForHumans()}}</time>
                        </p>

                        <div class="flex items-center mt-4 text-sm lg:justify-center">
                            <img src="https://i.pravatar.cc/100?u={{$post->id}}">
                            <div class="ml-3 text-left">
                                <h5 class="font-bold">

                                    {{-- <a href="/author/{{$post->author->username}}">{{$post->author->name}}</a>
                                     --}}
                                    <a href="/?author={{$post->author->username}}">{{$post->author->name}}</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-8">
                        <div class="justify-between hidden mb-6 lg:flex">
                            <a href="/"
                                class="relative inline-flex items-center text-lg transition-colors duration-300 hover:text-blue-500">
                                <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                        </path>
                                        <path class="fill-current"
                                            d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                        </path>
                                    </g>
                                </svg>

                                Back to Posts
                            </a>

                            <div class="space-x-2">
                                <x-category-button :category="$post->category" />

                            </div>
                        </div>

                        <h1 class="mb-10 text-3xl font-bold lg:text-4xl">
                            {{$post->title}}
                        </h1>

                        <div class="space-y-4 leading-loose lg:text-lg">
                            {!!$post->body!!}
                        </div>

                    </div>
                </article>

                <section>
                    <article class="flex">
                        <div>
                            <img src="https://i.pravatar.cc/100?u={{$post->author->id+1}}" alt="" class="rounded-full">
                        </div>
                    <div>
                        <header>
                            <h3 class="font-bold">{{$post->author->name}}</h3>
                            <p class="text-xs">
                                Posted 
                                <time>{{$post->created_at->diffForHumans()}}
                                    </time>
                                </p>
                        </header>
                        
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam pariatur eius, veniam in quaerat quos officia sint exercitationem? Quod, corporis illum fuga perspiciatis quibusdam itaque deserunt error reiciendis obcaecati debitis.
                        </p>
                    </div>
                    </article>
                </section>
            </main>


        </section>


</x-layout>

