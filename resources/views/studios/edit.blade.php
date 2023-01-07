<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-sans antiliased leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Studios') }}
        </h2>
    </x-slot>

    <div class="font-sans antialiased">
        <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 dark:bg-gray-900 sm:justify-center sm:pt-0">

            <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white dark:bg-gray-800 rounded-lg lg:max-w-4xl">

                <div class="mb-4">
                    <h1 class="font-sans antiliased text-3xl font-bold text-gray-800 dark:text-gray-200">Edit Studio</h1>
                </div>

                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                    <form method="POST" action="{{ route('studios.update',$studio->id) }}">
                        @csrf
                        @method('PUT')
                        <!-- Name -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="name">
                                Name
                            </label>

                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="name" placeholder="40" value="{{old('name',$studio->name)}}">
                            @error('name')
                            <span class="text-red-600 text-sm">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Established_at -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="established_at">
                                Established At
                            </label>

                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="date" name="established_at" value="{{old('established_at',$studio->established_at)}}">
                            @error('established_at')
                            <span class="text-red-600 text-sm">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="flex items-center justify-start mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-2 text-sm font-semibold rounded-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
