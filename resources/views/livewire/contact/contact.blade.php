<div class="container">

    @if (count($errors) > 0)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong>Sorry!</strong> invalid input.<br>
            <ul style="list-style-type:none;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <title>Close</title>
                    <path
                        d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                </svg>
            </span>                     
        </div>
    @endif

    <div class="flex justify-center">
        @include('livewire.contact.form') 
    </div>

    <h1>Contatos</h1>

    <table class="table w-full text-sm text-left text-gray-500 dark:text-gray-400 border mt-10">
        <thead class="table-header-group text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Id</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3 text-center">Action</th>
            </tr>
        </thead>

        @foreach ($data as $row)
            <tr class="hover:bg-gray-300 border-2">
                <td class="px-6 py-3 table-cell">{{ $loop->index + 1 }}</td>
                <td class="px-6 py-3 table-cell">{{ $row->name }}</td>
                <td class="px-6 py-3 table-cell">{{ $row->email }}</td>
                <td class="px-6 py-3 table-cell text-center">
                    <button wire:click="edit({{ $row->id }})"
                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                    <button wire:click="destroy({{ $row->id }})"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
