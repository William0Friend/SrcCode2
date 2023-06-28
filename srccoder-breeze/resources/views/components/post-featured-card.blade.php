@props(['post'])

<article
class="transition-colors duration-300 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl hover:text-black hover:bg-red-500">

<div class="px-5 py-6 lg:flex">
    {{-- TODO: --}}
    <diV>
        <img src="https://i.pravatar.cc/100?u={{$post->author->id}}" alt="" class="rounded-xl">
    </diV>

    <div class="flex flex-col justify-between flex-1">
        <header class="mt-8 lg:mt-0">
            <div class="space-x-2">
                <a href="/categories/{{$post->category->slug}}"
                   class="px-3 py-1 text-xs font-semibold text-blue-300 uppercase border border-blue-300 rounded-full"
                   style="font-size: 10px">{{$post->category->name}}</a>


            <div class="mt-4">
                <h1 class="text-3xl">
                    <a href="/posts/{{$post->slug}}">
                        {{$post->title}}
                    </a>
                </h1>

                <span class="block mt-2 text-xs text-gray-400">
                    {{-- datetime built on carbon --}}
                        Published <time>{{$post->created_at->diffForHumans()}}</time>
                    </span>
            </div>
        </header>

        <div class="mt-2 space-y-4 text-sm">
                {!!$post->excerpt!!}

            
        </div>

        <footer class="flex items-center justify-between mt-8">
            <div class="flex items-center text-sm">
                <img src="/images/lary-avatar.svg" alt="Lary avatar">
                <div class="ml-3">
                    <h5 class="font-bold">
                        <a href="/?author={{$post->author->username}}">{{$post->author->name}}</a>
                    </h5>
                </div>
            </div>

            <div class="hidden lg:block">
                <a href="/posts/{{$post->slug}}"
                   class="px-8 py-2 text-xs font-semibold transition-colors duration-300 bg-gray-200 rounded-full hover:bg-gray-300"
                >Read More</a>
            </div>
        </footer>
    </div>
</div>
</article>