<div class="w-full max-w-xs">
    <input type="hidden" wire:model="selected_id">
    <div class="form-group">
        <label for="exampleInputPassword1">Enter Name</label>
        <input type="text" wire:model="name" class="bg-white shadow-md rounded px-2 pt-1 pb-2 mb-4" placeholder="Name">
    </div>
    <div class="form-group">
        <label>Enter Email</label>
        <input type="email" wire:model="email" class="bg-white shadow-md rounded px-2 pt-1 pb-2 mb-4" placeholder="Email">
    </div>
    <button wire:click="update()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
    <button wire:click="resetInput()" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Limpar</button>
</div> 