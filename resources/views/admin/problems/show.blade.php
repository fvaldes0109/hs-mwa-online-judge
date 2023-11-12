<x-site-layout>
    <h1 class="text-4xl font-extrabold my-5">{{$problem->id}} - {{$problem->title}}</h1>

    <div>
        @foreach ($problem->tags as $tag)
            <x-tag-sticker index="{{$tag->id}}" name="{{$tag->name}}" />
        @endforeach
    </div>

    <div>
        <h2 class="text-2xl font-bold my-5">Description</h2>
        <p>{{$problem->description}}</p>

        <h2 class="text-2xl font-bold my-5">Example Input</h2>
        <p>{{$problem->example_input}}</p>

        <h2 class="text-2xl font-bold my-5">Example Output</h2>
        <p>{{$problem->example_output}}</p>
    </div>

    <div class="my-4">
        <a href={{route('admin.problems.edit', $problem->id)}}>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                Edit
            </button>
        </a>
        <form action={{route('admin.problems.destroy', $problem->id)}} method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">Delete</button>
        </form>
    </div>

</x-site-layout>