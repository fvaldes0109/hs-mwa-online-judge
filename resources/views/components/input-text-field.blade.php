<div class="flex flex-col">
    <label for={{$name}}>{{$label}}</label>
    <input type="text" name={{$name}} id={{$name}} class="border-2 rounded-lg p-2">
    <x-input-error-message name={{$name}}/>
</div>