<div>
    <input wire:model="query"  class="search-box" autofocus id="search" type="search" list="suggest" placeholder="Enter Keywords...">
    <button wire:click="search" class="search-icon"><i class="ti-search"></i></button>
    <datalist id="suggest">
        @foreach ($suggestions as $suggestion)
            <option class="pl-6" value="{{$suggestion->productname}}">{{ $suggestion->productname }}</option>
        @endforeach
    </datalist>
</div>