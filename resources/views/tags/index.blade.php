<x-site-layout>
    <h1 class="text-4xl font-extrabold text-center my-5">Tags</h1>

    <ul class="grid grid-cols-2 gap-4">
        @foreach ($tags as $tag)

        <li class="block p-2 shadow-xl bg-white rounded-lg">
            <a href={{route('tags.show', $tag->id)}}>
                <p class="text-xl font-bold">{{ $tag->name }}</p>
                <p class="font-bold">{{ $tag->problems->count() }} problems</p>
                <p class="text-gray-500">{{ $tag->description }}</p>
            </a>
        </li>

        @endforeach
    </ul>

</x-site-layout>