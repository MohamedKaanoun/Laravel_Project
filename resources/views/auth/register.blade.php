<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @vite(['resources/css/my_css.css'])
</head>
<body>
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <h2 class=" text-center text-2xl text-blue-600 font-bold leading-9 tracking-tight text-gray-900">Create an account</h2>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <form class="space-y-6" action="{{route('register')}}" method="POST">
        @csrf
        <div>
          <label for="username" class="block text-sm font-medium leading-6 text-gray-900">Username</label>
          <div class="mt-2">
            <input id="username" value="{{old('username')}}" name="username" type="text" autocomplete="username" class="input @error('username') ring-red-500 @enderror">
            @error('username')
              <p class="error">{{ $message}}</p>
            @enderror
          </div>
        </div>

        <div>
          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
          <div class="mt-2">
            <input id="email" value="{{old('email')}}" name="email" type="email" autocomplete="email"  class="input  @error('email') ring-red-500 @enderror">
            @error('email')
              <p class="error">{{ $message}}</p>
            @enderror
          </div>
        </div>

        <div>
          <div class="flex items-center justify-between">
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
          </div>
          <div class="mt-2">
            <input id="password" value="{{old('password')}}" name="password" type="password" autocomplete="new-password"  class="input focus:ring-indigo-600 sm:text-sm sm:leading-6 @error('password') ring-red-500 @enderror">
            @error('password')
              <p class="error">{{ $message}}</p>
            @enderror
          </div>
        </div>
        <div>
          <div class="flex items-center justify-between">
            <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">Confirm Password</label>
          </div>
          <div class="mt-2">
            <input value="{{ old('password_confirmation')}}" id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password"  class="input sm:text-sm sm:leading-6 @error('password_confirmation') ring-red-500 @enderror">
            @error('password_confirmation')
              <p class="error">{{ $message}}</p>
            @enderror
          </div>
        </div>
        <div>
          <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign up</button>
        </div>
        <input type="hidden" name="latitude" id="latitude">
        <input type="hidden" name="longitude" id="longitude">
      </form>

      <p class="mt-10 text-center text-sm text-gray-500">
        Already have an account?
        <a href="{{route('login')}}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Sign in here</a>
      </p>
    </div>
  </div>
  <script>
        document.addEventListener('DOMContentLoaded', (event) => {
    const form = document.getElementById('register-form');

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((position) => {
            document.getElementById('latitude').value = position.coords.latitude;
            document.getElementById('longitude').value = position.coords.longitude;
        }, (error) => {
            console.error("Error getting location: ", error);
        });
    } else {
        console.error("Geolocation is not supported by this browser.");
    }

    form.addEventListener('submit', (e) => {
        const latitude = document.getElementById('latitude').value;
        const longitude = document.getElementById('longitude').value;

        if (!latitude || !longitude) {
            e.preventDefault();
            alert("La géolocalisation est requise pour l'inscription. Veuillez activer la géolocalisation dans votre navigateur.");
        }
    });
});

    </script>
</body>
</html>
