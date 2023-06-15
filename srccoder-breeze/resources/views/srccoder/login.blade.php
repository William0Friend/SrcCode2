<x-srccoder>
    <section class="px-6 py-8">
        <main class="max-w-lg p-6 mx-auto mt-10 bg-gray-100 border border-gray-200 rounded-xl shadow-gray-500">
            <h1 class="text-xl font-bold text-center">Log In!</h1>
            <form method="POST" action="/login" class="mt-10 ">
                @csrf

                <div class="mb-6">
                    <label for="email" class="block mb-2 text-xs font-bold text-gray-700 uppercase">
                        email
                    </label>
                    <input type="email" name="email" id="email" class="w-full p-2 border border-gray-400" value="{{old('email')}}" required>
                </div>
                @error('email')
                {{--                instantly get message through laravel --}}
                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-xs font-bold text-gray-700 uppercase">
                        password
                    </label>
                    {{--                    value="{{old('password')}}" is no good in password think johntheripper--}}
                    <input type="password" name="password" id="password" class="w-full p-2 border border-gray-400"  required>
                </div>
                @error('password')
                {{--                instantly get message through laravel --}}
                <p class="mt-2 text-xs text-red-500">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    <button type="submit" class="px-4 py-2 text-white bg-blue-400 rounded hover:bg-blue-500">
                        Submit
                    </button>
                </div>

                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="mt-2 text-xs text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </form>
        </main>
    </section>
</x-srccoder>
