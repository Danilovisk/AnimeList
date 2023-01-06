<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-sans antiliased leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Mangas') }}
        </h2>
    </x-slot>

    <div class="font-sans antialiased">
        <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 dark:bg-gray-900 sm:justify-center sm:pt-0">

            <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white dark:bg-gray-800 rounded-lg lg:max-w-4xl">

                <div class="mb-4">
                    <h1 class="font-sans antiliased text-3xl font-bold text-gray-800 dark:text-gray-200">Create Manga</h1>
                </div>

                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                    <form method="POST" action="{{ route('mangas.store') }}">
                        @csrf
                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="title">
                                Title
                            </label>

                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="title" placeholder="255" value="{{old('title')}}">
                            @error('title')
                            <span class="text-red-600 text-sm">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700" for="description">
                                Description
                            </label>
                            <textarea name="description"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                rows="4" placeholder="400"> {{old('description')}}</textarea>
                            @error('description')
                            <span class="text-red-600 text-sm">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Author -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="author">
                                Author
                            </label>

                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="author" placeholder="25" value="{{old('author')}}">
                            @error('author')
                            <span class="text-red-600 text-sm">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Chapters -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="chapters">
                                Chapters
                            </label>

                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="chapters"  value="{{old('chapters')}}">
                            @error('chapters')
                            <span class="text-red-600 text-sm">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Started_at -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="started_at">
                                Started At
                            </label>

                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="date" name="started_at"  value="{{old('started_at')}}">
                            @error('started_at')
                            <span class="text-red-600 text-sm">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <!-- Finished -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="finished">
                                Finished
                            </label>

                            <select class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="finished" id="finished">
                                <option value="" hidden>Select an option</option>
                                <option value="1" @if (old('finished') == 1) selected @endif>True</option>
                                <option value="0" @if (old('finished') == 0) selected @endif>False</option>
                            </select>
                            @error('finished')
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
