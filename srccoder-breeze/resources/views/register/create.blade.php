<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border p-6 border-gray-200 rounded-xl shadow-gray-500">
            <h1 class="text-center font-bold text-xl">Register!</h1>
            <form method="POST" action="/register" class="mt-10 ">
                @csrf

                <div class="mb-6 ">
                    <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700 ">
                        name
                        </label>
                    <input type="text" name="name" id="name" class="border border-gray-400 p-2 w-full" value="{{old('name')}}" required>
                    </div>
                @error('name')
{{--                instantly get message through laravel --}}
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        username
                        </label>
                    <input type="text" name="username" id="username" class="border border-gray-400 p-2 w-full" value="{{old('username')}}" required>
                </div>
                @error('username')
                {{--                instantly get message through laravel --}}
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        email
                        </label>
                    <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full" value="{{old('email')}}" required>
                </div>
                @error('email')
                {{--                instantly get message through laravel --}}
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        password
                        </label>
{{--                    value="{{old('password')}}" is no good in password think johntheripper--}}
                    <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full"  required>
                </div>
                @error('password')
                {{--                instantly get message through laravel --}}
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>
                </div>

                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-500 text-xs mt-2">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </main>
    </section>
</x-layout>
