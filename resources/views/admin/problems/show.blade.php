<x-site-layout title="{{$problem->id}} - {{$problem->title}}">

    <div>
        @foreach ($problem->tags as $tag)
            <x-tag-sticker :tag="$tag"/>
        @endforeach
    </div>

    <div>
        <h2 class="text-2xl font-bold my-5">Description</h2>
        <p>{!!$problem->description!!}</p>

        <x-in-out-area title="Example Input" :value="$problem->example_input" />
        <x-in-out-area title="Example Output" :value="$problem->example_output" />

        <h2 class="text-2xl font-bold my-5">Download Test Cases</h2>

        <a class="bg-blue-400 mx-2 p-2 rounded-lg text-white font-bold shadow-md" href="{{route('admin.testcase.download', ['id' => $problem->id, 'type' => 'in'])}}">
            Input Cases
        </a>
        <a class="bg-blue-400 mx-2 p-2 rounded-lg text-white font-bold shadow-md" href="{{route('admin.testcase.download', ['id' => $problem->id, 'type' => 'out'])}}">
            Output Cases
        </a>
    </div>

    <div class="my-4">

        <h2 class="text-2xl font-bold my-5">Alter</h2>

        <a href={{route('admin.problems.edit', $problem)}}>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">
                Edit
            </button>
        </a>
        <form action={{route('admin.problems.destroy', $problem)}} method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg shadow-md">Delete</button>
        </form>
    </div>

</x-site-layout>
