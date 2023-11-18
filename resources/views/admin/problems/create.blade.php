<x-site-layout title="Create Problem">

    <form action={{route('admin.problems.store')}} method="POST" class="w-5/6 mx-auto">
        @csrf

        <x-input-text-field name="title" label="Title"/>
        <x-tag-selector :tags="$tags"/>
        <x-input-textarea-field name="description" label="Description"/>
        <x-input-textarea-field name="example_input" label="Example Input"/>
        <x-input-textarea-field name="example_output" label="Example Output"/>

        <div class="flex flex-col">
            <button type="submit" class="border-2 rounded-lg p-2 shadow-sm bg-blue-500 hover:bg-blue-700 text-white font-bold my-3">Create</button>
        </div>

    </form>

</x-site-layout>
