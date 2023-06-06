<x-srccoder>

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
            </form>   <!-- Add reCAPTCHA -->
                <div class="g-recaptcha" data-sitekey="6LeX8QgmAAAAAOcNiIR33KEX93i3VpayxDWzBKzu">

                </div>
        </main>
    </section>
    <!-- recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- jquery validate -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <main>
        <div class="container">
            <h2 class="my-3 text-center">Registration Form</h2>

            <form id="registrationForm" action="/srccoder/register_recaptcha_action" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Please choose a new username" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Please enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Please enter your password" required>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label fw-bold">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Please confirm your password" required>
                </div>


                <!-- Add reCAPTCHA -->
                <div class="g-recaptcha" data-sitekey="6LeX8QgmAAAAAOcNiIR33KEX93i3VpayxDWzBKzu">

                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary align-center">Register</button>
                </div>
            </form>
        </div>

    <script>
        $(document).ready(function() {
            $("#registrationForm").validate({
                rules: {
                    username: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 10,
                        maxlength: 18,
                        pattern: /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,10}$/
                    },
                    confirm_password: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    username: {
                        required: "Username cannot be empty"
                    },
                    email: {
                        required: "Email cannot be empty",
                        email: "Please enter a valid email"
                    },
                    password: {
                        required: "Password cannot be empty",
                        minlength: "Password must be between 10 and 18 characters",
                        maxlength: "Password must be between 10 and 18 characters",
                        pattern: "Please enter a valid password, a correct password has a minimum of 10 and maximum of 18 characters, at least one uppercase letter, one lowercase letter, one number and one special character."
                    },
                    confirm_password: {
                        required: "Please confirm your password",
                        equalTo: "Passwords do not match"
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
    </main>

    <!-- recaptcha -->
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <!-- jquery validate -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</x-srccoder>
