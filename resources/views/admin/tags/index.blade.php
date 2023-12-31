<x-site-layout title="Tags">

    <x-search-bar placeholder="Search tag by name..." />

    <div class="mb-3">
        {{$tags->links()}}
    </div>

    <x-success-message />

    <div class="mb-5">
        <a href={{route('admin.tags.create')}}>
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                Create Tag
            </button>
        </a>
    </div>

    <ul class="grid lg:grid-cols-2 md:grid-cols-2 gap-x-3">
        @foreach ($tags as $tag)
        <li class="bg-white my-2 p-2 font-bold shadow-md flex place-content-between">
            <a href={{route('admin.tags.show', $tag)}} class="underline">
                {{$tag->name}}
            </a>

            <div>
                <a href={{route('admin.tags.edit', $tag)}} class="underline">Edit</a>
                &nbsp;|&nbsp;
                <form action={{route('admin.tags.destroy', $tag)}} method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="underline font-bold">Delete</button>
                </form>
            </div>
        </li>
        @endforeach
    </ul>

</x-site-layout>
