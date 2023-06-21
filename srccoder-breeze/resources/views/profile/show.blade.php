<x-app-guest>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Profile</div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Name:</strong> {{ $user->name }}</p>
                                <p><strong>Email:</strong> {{ $user->email }}</p>
                                <!-- Add more fields as needed -->
                            </div>
                            <div class="col-md-6">
                                <div class="text-right">
                                    <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-primary">Edit Profile</a>
                                </div>
                                {{--  <!-- Display the user's avatar image -->  --}}
                                {{--  @if($user->image)
                                    <img src="{{ $user->image->url }}" class="rounded-circle" width="200" height="200">
                                @else  --}}
                                    {{--  <!-- Display a default avatar image -->  --}}
                                    <img src="https://via.placeholder.com/200" class="rounded-circle">
                                {{--  @endif  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-guest>
