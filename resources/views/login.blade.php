<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    

<main
  class="mx-auto flex min-h-screen w-full items-center justify-center bg-gray-900 text-white"
>
  <!-- component -->
  <section class="flex w-[30rem] flex-col space-y-10">
    <div class="text-center text-4xl font-medium">Log In</div>
    <form method="POST" action="{{ route('login') }}" class="space-y-10">
      @csrf
  
      <!-- Email Input -->
      <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
          <input
              name="email"
              type="text"
              placeholder="Email or Username"
              class="w-full border-none bg-transparent outline-none placeholder-italic focus:outline-none"
          />
      </div>
  
      <!-- Password Input -->
      <div class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500">
          <input
              name="password"
              type="password"
              placeholder="Password"
              class="w-full border-none bg-transparent outline-none placeholder-italic focus:outline-none"
          />
      </div>
  
      <!-- Error Messages -->
      @error('email')
          <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
      @enderror
  
      @error('password')
          <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
      @enderror
  
      <!-- Login Button -->
      <button class="transform rounded-sm bg-gradient-to-r from-indigo-500 to-purple-600 py-3 px-6 font-bold text-lg duration-300 hover:from-indigo-600 hover:to-purple-700 hover:shadow-lg">
          LOG IN
      </button>
  </form>
  
    <a
      href="#"
      class="transform text-center font-semibold text-gray-500 duration-300 hover:text-gray-300"
      >FORGOT PASSWORD?</a
    >

    <p class="text-center text-lg">
      No account?
      <a
        href="{{route('register')}}"
        class="font-medium text-indigo-500 underline-offset-4 hover:underline"
        >Create One</a
      >
    </p>
  </section>
</main>
</body>
</html>