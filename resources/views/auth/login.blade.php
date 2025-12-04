<x-layout>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <h2>Log In to Your Account</h2>
        <div class="form-group m-4 col-6">
            <label for="email">Email address</label>
            <input type="email" class="form-control my-4" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Enter email" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group m-4 col-6">
            <label for="password">Password</label>
            <input type="password" class="form-control my-4" name="password" placeholder="Password" required>
        </div>

        <button type="submit" class="btn btn-primary m-4">Log in</button>

         @if($errors->any())
            <ul class="px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>
</x-layout>