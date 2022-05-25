<div class="min-w-screen">
    <div class="flex">
        <div class="sticky top-0 z-10 w-full flex-shrink-0 h-16 flex flex-row justify-between">
            <div class="flex justify-start w-1/2 items-center flex-row">
                <h4 class="w-24 text-lg flex p-5 leading-7 text-gray-600">Users</h4>
                <form class="w-24 flex mx-4 relative" action="#" method="GET">
                    <input type="text" name="account-number" id="account-number" class="focus:ring-slate-300 focus:border-slate-300 text-base w-full pr-10 sm:text-sm border-gray-100" placeholder="Year">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <!-- Heroicon name: solid/question-mark-circle -->
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </form>
                <div class="mx-4 mr-10 w-96 relative flex">
                    <input type="text" name="account-number" id="account-number" class="focus:ring-slate-300 focus:border-slate-300 text-base w-full pr-10 sm:text-sm border-gray-100" placeholder="Search...">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <!-- Heroicon name: solid/question-mark-circle -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="flex-1 flex justify-end w-1/2 gap-4 flex-row items-center">
                <form class="w-1/6 flex" action="#" method="GET">
                    <select id="location" name="location" class="text-lg border-transparent bg-gray-50 focus:outline-none focus:ring-slate-300 focus:border-slate-300">
                        <option>Language</option>
                    </select>
                </form>
                <form class="w-1/6 flex" action="#" method="GET">
                    <select id="location" name="location" class="text-lg border-transparent bg-gray-50 focus:outline-none focus:ring-slate-300 focus:border-slate-300">
                        <option>Reports</option>
                    </select>
                </form>
                <form class="w-1/6 flex" action="#" method="GET">
                    <select id="location" name="location" class="text-lg border-transparent bg-gray-50 focus:outline-none focus:ring-slate-300 focus:border-slate-300">
                        <option>Project</option>
                    </select>
                </form>
                <a href="#" class="flex items-center relative p-4 text-lg text-black-200 hover:bg-black-700">
                    <!-- Heroicon name: outline/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>
                    <span class="sr-only">Mail</span>
                    <span class="text-xs font-semibold absolute top-4 left-8 inline-block py-1.5 px-1.5 rounded-full text-blue-600 bg-blue-500 uppercase last:mr-0 mr-1">
                    </span>
                </a>
                <a href="#" class="flex items-center relative p-4 text-lg text-black-200 hover:bg-black-700">
                    <!-- Heroicon name: outline/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                    </svg>
                    <span class="sr-only">Notifications</span>
                    <span class="text-xs font-semibold absolute top-4 left-8 inline-block py-1.5 px-1.5 rounded-full text-blue-600 bg-blue-500 uppercase last:mr-0 mr-1">
                    </span>
                </a>
                <a href="#" class="flex items-center p-4 text-lg text-black-200 hover:bg-black-700">
                    <!-- Heroicon name: outline/user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Profile</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>