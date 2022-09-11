<div >
    <input  wire:model="query" wire:keydown.enter="search" class="search-box" autofocus id="search" type="search" list="suggest" placeholder="Enter Keywords...">
    <button wire:click="search" class="search-icon"><i class="ti-search"></i></button>
    <datalist id="suggest" class="bg-dark">
        @foreach ($suggestions as $suggestion)
        <option class="pl-3" value="{{$suggestion->productname}}">{{ $suggestion->productname }}</option>
        @endforeach
    </datalist>
</div>