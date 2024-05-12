<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    
    <div class="h-screen bg-gray-100 flex justify-center">
        
        <div class="py-6 px-8 h-80 mt-20 bg-white rounded shadow-xl">
            
            <div class="container mx-auto py-8 antialiased" style="margin-top:-2rem">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-6">
                    <label for="email" class="block text-gray-800 font-bold">{{ __('Email') }}</label>
                    <input type="email" name="email" id="email" placeholder="jhon.mail@mail.com" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 ring-indigo-600" />
                </div>
    
                <div>
                    <label for="password" class="block text-gray-800 font-bold">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="password" class="w-full border border-gray-300 py-2 pl-3 rounded mt-2 outline-none focus:ring-indigo-600 ring-indigo-600" />
                    <a href="#" class="text-sm font-thin text-gray-800 hover:underline mt-2 inline-block hover:text-indigo-600">{{ __('Forgot your password?') }}</a>
                </div>
                <button type="submit" class="cursor-pointer py-2 px-4 block mt-6 bg-indigo-500 text-white font-bold w-full text-center rounded">{{ __('Log in') }}</button>
            </form>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
    
    
</body>
</html>