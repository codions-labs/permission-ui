@php $role_key = \Illuminate\Support\Str::random(6) @endphp
<div class="relative permission-ui-dropdown"
    x-data="{ open: false }"
    :key='"{{$role_key}}"'
    @keydown.window.escape="open = false"
    @click.away="open = false"
    @refresh-mappings.window="open = false">
    <div @click="open = !open"
        class="inline-flex border-0 rounded-none px-1 focus:shadow-none focus:outline-none"
        aria-haspopup="true" aria-expanded="true">
        <i class="fa fa-ellipsis-v"></i>
    </div>
    <div x-show="open" x-cloak
        x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-0"
        x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-0"
        class="origin-top-left absolute left-full top-0 mt-2 w-full rounded-md shadow-lg z-10 min-w-full text-gray-700"
        style="width: 270px">
        <div class="rounded-md bg-white" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            <div class="px-4 py-2 font-light text-lg rounded-t-md">
                @lang("Edit Role")
            </div>
            <div class="px-3 pb-3 text-sm">
                @if(count($errors))
                <div class="w-full">
                    @foreach ($errors->all() as $message)
                    <div class="bg-red-200 p-2 rounded text-gray-900 text-sm leading-4 mb-1"><b>@lang("Error"):
                        </b>{{ $message }}</div>
                    @endforeach
                </div>
                @endif
                <div class="w-full mb-1">
                    <input wire:model.debounce.500ms="name" class="bg-cool-gray-200 appearance-none w-full rounded p-2 text-gray-700
                           leading-tight focus:outline-none focus:shadow-none" wire:loading.attr="disabled" placeholder="@lang('Role Name')">
                </div>
                <div class="w-full mb-1">
                    <button type="button" wire:click="updateRole" href="#" class="w-full rounded p-2 px-3 bg-indigo-100
                            hover:bg-indigo-200 focus:outline-none text-left" role="menuitem"
                        wire:loading.attr="disabled"><b>@lang("Update Name")</b>
                        <p class="text-xs">Updates the role name and saves it to the database</p>
                    </button>
                </div>
                <div class="w-full mb-1">
                    <button type="button" wire:click="allowAll" href="#" class="w-full rounded p-2 px-3 bg-indigo-100
                    hover:bg-indigo-200 focus:outline-none text-left" role="menuitem" wire:loading.attr="disabled">
                        <b>@lang("Grant All Permissions")</b>
                        <p class="text-xs">Gives the role all the permissions defined in the system.</p>
                    </button>
                </div>
                <div class="w-full mb-1">
                    <button type="button" wire:click="disallowAll" href="#" class="w-full rounded p-1 px-3 bg-indigo-100
                    hover:bg-indigo-200 focus:outline-none text-left" role="menuitem" wire:loading.attr="disabled">
                    <b>@lang("Revoke All Permissions")</b>
                    <p class="text-xs">Takes back all the permissions from the role.</p>
                    </button>
                </div>
                <div class="w-full">
                    <button type="button" wire:click="deleteRole" href="#" class="w-full rounded p-1 px-3 bg-red-100
                    hover:bg-red-200 focus:outline-none text-left" role="menuitem" wire:loading.attr="disabled">
                    <b>@lang("Delete Role")</b>
                    <p class="text-xs">Removes the role from the system</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
