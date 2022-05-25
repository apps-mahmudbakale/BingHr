    <!-- modal -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="user-{{ $user->id }}">
        <div class="my-6 mx-auto w-8/12 h-4/5">
            <!--content-->
            <div class="border-0 rounded-lg shadow-lg flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-3 border-b border-solid border-slate-200 rounded-t">
                    <span class="text-lg block">
                        Update User
                    </span>
                    <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-2 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('user-{{ $user->id }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!--body-->
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="p-6 flex-auto">
                        <div class="grid grid-cols-1">
                            <div class="my-3 pt-0">
                                <input type="text" name="employee_id" value="{{ $user->employee_id }}" placeholder="Employee ID *" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white bg-white rounded text-sm border border-slate-200 shadow outline-none focus:outline-none focus:ring w-full h-10" />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="my-3 pt-0">
                                <input type="text" name="first_name" value="{{ $user->first_name }}" placeholder="First Name *" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white bg-white rounded text-sm border border-slate-200 shadow outline-none focus:outline-none focus:ring w-full h-10" />
                            </div>
                            <div class="my-3 pt-0">
                                <input type="text" name="last_name" value="{{ $user->last_name }}" placeholder="Last Name *" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white bg-white rounded text-sm border border-slate-200 shadow outline-none focus:outline-none focus:ring w-full h-10" />
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div class="my-3 pt-0">
                                <input type="email" name="email" value="{{ $user->email }}" placeholder="Email ID *" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white bg-white rounded text-sm border border-slate-200 shadow outline-none focus:outline-none focus:ring w-full h-10" />
                            </div>
                            <div class="my-3 pt-0">
                                <input type="text" name="phone" value="{{ $user->phone }}" placeholder="Mobile No" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white bg-white rounded text-sm border border-slate-200 shadow outline-none focus:outline-none focus:ring w-full h-10" />
                            </div>
                            <div class="my-3 pt-0">
                                <select id="role" name="role" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white bg-white rounded text-sm border border-slate-200 shadow outline-none focus:outline-none focus:ring w-full h-10">
                                    <option>Select Role type</option>
                                    @foreach($roles as $role)
                                    <option @if($user->roles?->first()?->name === $role->name) selected @endif value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div class="my-3 pt-0">
                                <input type="text" name="username" value="{{ $user->username }}" placeholder="Username *" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white bg-white rounded text-sm border border-slate-200 shadow outline-none focus:outline-none focus:ring w-full h-10" />
                            </div>
                        </div>
                    </div>
                    <div class="flex-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-400 tracking-wider">Module Permission</th>
                                    <th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-400 tracking-wider">Create</th>
                                    <th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-400 tracking-wider">Read</th>
                                    <th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-400 tracking-wider">Update</th>
                                    <th scope="col" class="px-6 py-5 text-left text-sm font-bold text-gray-400 tracking-wider">Delete</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($permissions as $key => $permissionsGroup)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 text-left">
                                        {{ ucfirst($key) }}
                                    </td>
                                    @foreach($permissionsGroup as $permission)
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-left">
                                        <input @if($user->hasPermissionTo($permission['name'])) checked @endif id="{{ $key }}" aria-describedby="{{ $permission['name'] }}" name="permissions[]" type="checkbox" value="{{ $permission['name'] }}" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded h-10">
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--footer-->
                    <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                        <button class="bg-blue-500 text-white active:bg-blue-600 font-bold text-sm px-2 py-1 rounded-lg shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="submit">
                            Update User
                        </button>
                        <button class="text-gray-400 background-transparent font-bold px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('user-{{ $user->id }}')">
                            Cancel
                        </button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="user-{{ $user->id }}-backdrop"></div>
    <script type="text/javascript">
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }
    </script>