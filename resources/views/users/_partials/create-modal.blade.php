    <!-- modal -->
    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
        <div class="my-6 mx-auto w-8/12 h-4/5">
            <!--content-->
            <div class="border-0 rounded-lg shadow-lg flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-3 border-b border-solid border-slate-200 rounded-t">
                    <span class="text-lg block">
                        Add User
                    </span>
                    <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-2 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!--body-->
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="p-6 flex-auto">
                        <div class="grid grid-cols-1">
                            <div class="my-3 pt-0">
                                <input type="text" name="employee_id" placeholder="Employee ID *" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white rounded text-sm border border-slate-100 shadow focus:border-1 focus:border-blue-100 focus:ring w-full h-10 h-10" />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="my-3 pt-0">
                                <input type="text" name="first_name" placeholder="First Name *" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white rounded text-sm border border-slate-100 shadow focus:border-1 focus:border-blue-100 focus:ring w-full h-10" />
                            </div>
                            <div class="my-3 pt-0">
                                <input type="text" name="last_name" placeholder="Last Name *" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white rounded text-sm border border-slate-100 shadow focus:border-1 focus:border-blue-100 focus:ring w-full h-10" />
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div class="my-3 pt-0">
                                <input type="email" name="email" placeholder="Email ID *" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white rounded text-sm border border-slate-100 shadow focus:border-1 focus:border-blue-100 focus:ring w-full h-10" />
                            </div>
                            <div class="my-3 pt-0">
                                <input type="text" name="phone" placeholder="Mobile No" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white rounded text-sm border border-slate-100 shadow focus:border-1 focus:border-blue-100 focus:ring w-full h-10" />
                            </div>
                            <div class="my-3 pt-0">
                                <select id="role" name="role" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white rounded text-sm border border-slate-100 shadow focus:border-1 focus:border-blue-100 focus:ring w-full h-10">
                                    <option>Select Role type</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-3">
                            <div class="my-3 pt-0">
                                <input type="text" name="username" placeholder="Username *" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white rounded text-sm border border-slate-100 shadow focus:border-1 focus:border-blue-100 focus:ring w-full h-10" />
                            </div>
                            <div class="my-3 pt-0">
                                <input type="password" name="password" placeholder="Password *" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white rounded text-sm border border-slate-100 shadow focus:border-1 focus:border-blue-100 focus:ring w-full h-10" />
                            </div>
                            <div class="my-3 pt-0">
                                <input type="password" name="password_confirmation" placeholder="Confirm Password *" class="px-2 py-1 placeholder-gray-500 text-gray-500 bg-white rounded text-sm border border-slate-100 shadow focus:border-1 focus:border-blue-100 focus:ring w-full h-10" />
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
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ ucfirst($key) }}
                                    </td>
                                    @foreach($permissionsGroup as $permission)
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <input id="{{ $key }}" aria-describedby="{{ $permission['name'] }}" name="permissions[]" type="checkbox" value="{{ $permission['name'] }}" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded h-10">
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
                            Add User
                        </button>
                        <button class="text-gray-400 background-transparent font-bold px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                            Cancel
                        </button>
                </form>
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