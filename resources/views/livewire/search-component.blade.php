<div>
    <input style="margin: 0px;" wire:model="query" wire:keydown.enter="search" class="search-box" autofocus id="search" type="search" list="suggest" placeholder="Enter Keywords...">
    <button wire:click="search" class="search-icon"><i class="ti-search"></i></button>
    <datalist  style="width: inherit;margin:0%" id="suggest">
        @foreach ($suggestions as $suggestion)
            <option style="width: inherit;margin:0%" class="p-0" value="{{$suggestion->productname}}">{{ $suggestion->productname }}</option>
        @endforeach
    </datalist>
</div>