<x-app-layout>
    <div class="flex flex-col">
        <div class="flex justify-between">
            <div class="w-1/4 border-0 rounded relative text-white
             @if(session()->get('flash_success'))
             bg-green-500
             @endif
            ">
                <span class="inline-block align-middle items-center p-2">
                    {{ session()->get('flash_success') }}
                </span>
            </div>
            <button class="bg-green-700 text-white active:bg-green-900 font-bold text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                Add User
            </button>
        </div>
        <div class="">
            <div class="py-2 align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <div class="fle flex-col">
                        <div class="flex justify-between items-center bg-white">
                            <h4 class="text-lg flex p-5 leading-7 text-gray-900">List Users</h4>
                            <form action="#" method="GET">
                                <div class="w-96 relative flex mr-1 h-10">
                                    <input type="text" name="search" value="{{ request()->search ?? '' }}" id="search" class="focus:ring-slate-300 focus:border-slate-300 text-base w-full sm:text-sm border-gray-100" placeholder="Search...">
                                    <button type="submit" class="absolute inset-y-0 right-0 flex items-center bg-gray-200 border-2 rounded-sm border-slate-300 py-2 px-3">
                                        <!-- Heroicon name: solid/question-mark-circle -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-400 tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-400 tracking-wider"></th>
                                    <th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-400 tracking-wider">Create Date</th>
                                    <th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-400 tracking-wider">Role</th>
                                    <th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-400 tracking-wider">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($users as $key => $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <span class="text-md font-medium text-gray-900">{{ $user->name }}</span>
                                                <small class="text-sm text-gray-500 block">{{ $user->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <span class="text-xs font-bold inline-block py-1 px-2 rounded-lg text-white bg-blue-500 last:mr-0 mr-1">
                                            Super Administrator
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->created_at->toDateString() }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $user->roles?->first()?->name ?? 'Not Assigned' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex flex-row gap-3">
                                        <a onclick="toggleModal('user-{{ $user->id }}')" class="text-gray-400 hover:text-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        @include('users._partials.edit-modal')
                                        <a onclick="toggleModal('delete-modal')" class="text-gray-400 hover:text-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <div class="flex flex-col text-slate-400 text-2xl items-center">
                                        Empty Records
                                    </div>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="flex p-4 just-fy-between">
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="delete-modal">
        <div class="relative w-auto my-2 mx-auto max-w-sm">
            <!--content-->
            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-center justify-center px-5 py-2 border-b border-solid border-slate-200 rounded-t">
                    <h3 class="text-2xl items-center font-semibold">
                        Delete Item?
                    </h3>
                </div>
                <!--body-->
                <div class="relative flex-auto">
                    <p class="my-4 text-slate-500 text-md text-center leading-relaxed">
                        Are you sure you want to delete this item?
                        <span class="block text-lg font-bold">This action is not reversible</span>
                    </p>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end border-t border-solid border-slate-200 rounded-b">
                    <button class="text-slate-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('delete-modal')">
                        Cancel
                    </button>
                    <a href="{{ route('users.delete', $user->id) }}" class="bg-red-500 text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                        Proceed
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
    <script type="text/javascript">
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
    </script>

    <!-- modal -->
    @include('users._partials.create-modal')
</x-app-layout>