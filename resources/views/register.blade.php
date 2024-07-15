<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-indigo-100 flex justify-center items-center h-screen">
<div class="lg:w-2/5 md:w-1/2 w-2/3">
    <form method="POST" action="{{ route('register') }}" class="bg-white p-10 rounded-lg shadow-lg min-w-full">
        @csrf
        <h1 class="text-center text-2xl mb-6 text-gray-600 font-bold font-sans">Register</h1>
        <div>
            <label class="text-gray-800 font-semibold block my-3 text-md" for="username">Username</label>
            <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="username" id="username" placeholder="username" />
            @error('username')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label class="text-gray-800 font-semibold block my-3 text-md" for="email">Email</label>
            <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="text" name="email" id="email" placeholder="@email" />
        @error('email')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        </div>
        <div>
            <label class="text-gray-800 font-semibold block my-3 text-md" for="password">Password</label>
            <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="password" name="password" id="password" placeholder="password" />
        </div>
        <div>
            <label class="text-gray-800 font-semibold block my-3 text-md" for="password_confirmation">Confirm password</label>
            <input class="w-full bg-gray-100 px-4 py-2 rounded-lg focus:outline-none" type="password" name="password_confirmation" id="password_confirmation" placeholder="confirm password" />
        @error('password')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
        @enderror
        </div>
        <button type="submit" class="w-full mt-6 bg-indigo-600 rounded-lg px-4 py-2 text-lg text-white tracking-wide font-semibold font-sans">Register</button>
        <a href="{{ route('login') }}" class="w-full mt-6 mb-3 bg-indigo-100 rounded-lg px-4 py-2 text-lg text-gray-800 tracking-wide font-semibold font-sans text-center block">Login</a>
    </form>
</div>
</body>
</html>
