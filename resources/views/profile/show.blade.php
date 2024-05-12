<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>| Mi Perfil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>


    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Acme</span>
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <button type="button"
                    class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                    data-dropdown-placement="bottom">
                    {{-- <span class="sr-only">Open user menu</span> --}}
                    <img class="w-8 h-8 rounded-full"
                        src="data:image/jpeg;base64,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"
                        alt="user photo">
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                        <span
                            class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="{{ route('dashboard') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li style="cursor: pointer">
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                    style="cursor: pointer"> <input type="submit" value="Cerrar Sesion"
                                        style="cursor: pointer"> </a>

                            </form>

                        </li>
                    </ul>
                </div>
            </div>

            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="{{route('dashboard')}}"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                            aria-current="page">Ver Perfil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <h1 class="text-center" style="font-size:3rem; font-weight:bold;">Sus Datos son los Siguientes:</h1>
    <div class="flex items-center justify-center" style="margin-top: 2rem">
        <div class="container">
            <table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
                <thead class="text-white">
                    <tr
                        class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
                        <th class="p-3 text-left">Nombre</th>
                        <th class="p-3 text-left">Email</th>
                        <th class="p-3 text-left" width="110px">Rol</th>
                    </tr>
                </thead>
                <tbody class="flex-1 sm:flex-none">
                    <tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">
                        <td class="border-grey-light border hover:bg-gray-100 p-3">{{ Auth::user()->name }}</td>
                        <td class="border-grey-light border hover:bg-gray-100 p-3 truncate">{{ Auth::user()->email }}
                        </td>
                        <td
                            class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
                            {{ Auth::user()->userType }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
        <style>
            @media (min-width: 640px) {
                table {
                    display: inline-table !important;

                }

                thead tr:not(:first-child) {
                    display: none;
                }
            }

            td:not(:last-child) {
                border-bottom: 0;
            }

            th:not(:last-child) {
                border-bottom: 2px solid rgba(0, 0, 0, .1);
            }
        </style>
          <center>
            <footer class="text-center text-sm text-black" style="margin-top: 2rem;">
                Creado por William Mazariego - MO232723 &nbsp; &copy;
            </footer>
        </center>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

</body>

</html>
