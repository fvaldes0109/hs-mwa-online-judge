<x-site-layout title="Create Tag">

    <form action={{route('admin.tags.store')}} method="POST" class="w-5/6 max-w-xl mx-auto">
        @csrf

        <x-input-text-field name="name" label="Name"/>

        <x-input-textarea-field name="description" label="Description"/>

        <div class="flex flex-col">
            <button type="submit" class="border-2 rounded-lg p-2 shadow-sm bg-blue-500 hover:bg-blue-700 text-white font-bold my-3">Create</button>
        </div>

    </form>

</x-site-layout>
