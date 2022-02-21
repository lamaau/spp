<template>
  <div class="h-modal fixed top-4 left-0 right-0 z-50 hidden items-center justify-center overflow-y-auto overflow-x-hidden sm:h-full md:inset-0" id="user-modal" aria-hidden="true">
    <div class="relative h-full w-full max-w-2xl px-4 md:h-auto">
      <div class="relative rounded-lg bg-white shadow">
        <div class="flex items-start justify-between rounded-t border-b p-5">
          <h3 class="text-xl font-semibold">Edit user</h3>
          <button type="button" class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900" data-modal-toggle="user-modal">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
        </div>

        <div class="space-y-6 p-6">
          <form action="#">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first-name" class="mb-2 block text-sm font-medium text-gray-900">First Name</label>
                <input
                  type="text"
                  name="first-name"
                  id="first-name"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                  placeholder="Bonnie"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="last-name" class="mb-2 block text-sm font-medium text-gray-900">Last Name</label>
                <input
                  type="text"
                  name="last-name"
                  id="last-name"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                  placeholder="Green"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="email" class="mb-2 block text-sm font-medium text-gray-900">Email</label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                  placeholder="example@company.com"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="phone-number" class="mb-2 block text-sm font-medium text-gray-900">Phone Number</label>
                <input
                  type="number"
                  name="phone-number"
                  id="phone-number"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                  placeholder="e.g. +(12)3456 789"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="department" class="mb-2 block text-sm font-medium text-gray-900">Department</label>
                <input
                  type="text"
                  name="department"
                  id="department"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                  placeholder="Development"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="company" class="mb-2 block text-sm font-medium text-gray-900">Company</label>
                <input
                  type="number"
                  name="company"
                  id="company"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                  placeholder="123456"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="current-password" class="mb-2 block text-sm font-medium text-gray-900">Current Password</label>
                <input
                  type="password"
                  name="current-password"
                  id="current-password"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                  placeholder="••••••••"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="new-password" class="mb-2 block text-sm font-medium text-gray-900">New Password</label>
                <input
                  type="password"
                  name="new-password"
                  id="new-password"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                  placeholder="••••••••"
                  required=""
                />
              </div>
            </div>
          </form>
        </div>

        <div class="items-center rounded-b border-t border-gray-200 p-6">
          <button class="rounded-lg bg-cyan-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200" type="submit">Save all</button>
        </div>
      </div>
    </div>
  </div>

  <div class="h-modal fixed top-4 left-0 right-0 z-50 hidden items-center justify-center overflow-y-auto overflow-x-hidden sm:h-full md:inset-0" id="add-user-modal" aria-hidden="true">
    <div class="relative h-full w-full max-w-2xl px-4 md:h-auto">
      <div class="relative rounded-lg bg-white shadow">
        <div class="flex items-start justify-between rounded-t border-b p-5">
          <h3 class="text-xl font-semibold">Add new user</h3>
          <button type="button" class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900" data-modal-toggle="add-user-modal">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
        </div>

        <div class="space-y-6 p-6">
          <form action="#">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first-name" class="mb-2 block text-sm font-medium text-gray-900">First Name</label>
                <input
                  type="text"
                  name="first-name"
                  id="first-name"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                  placeholder="Bonnie"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="last-name" class="mb-2 block text-sm font-medium text-gray-900">Last Name</label>
                <input
                  type="text"
                  name="last-name"
                  id="last-name"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                  placeholder="Green"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="email" class="mb-2 block text-sm font-medium text-gray-900">Email</label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                  placeholder="example@company.com"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="phone-number" class="mb-2 block text-sm font-medium text-gray-900">Phone Number</label>
                <input
                  type="number"
                  name="phone-number"
                  id="phone-number"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                  placeholder="e.g. +(12)3456 789"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="department" class="mb-2 block text-sm font-medium text-gray-900">Department</label>
                <input
                  type="text"
                  name="department"
                  id="department"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                  placeholder="Development"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="company" class="mb-2 block text-sm font-medium text-gray-900">Company</label>
                <input
                  type="number"
                  name="company"
                  id="company"
                  class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-gray-900 shadow-sm focus:border-cyan-600 focus:ring-cyan-600 sm:text-sm"
                  placeholder="123456"
                  required=""
                />
              </div>
            </div>
          </form>
        </div>

        <div class="items-center rounded-b border-t border-gray-200 p-6">
          <button class="rounded-lg bg-cyan-600 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200" type="submit">Add user</button>
        </div>
      </div>
    </div>
  </div>

  <div class="h-modal fixed top-4 left-0 right-0 z-50 hidden items-center justify-center overflow-y-auto overflow-x-hidden sm:h-full md:inset-0" id="delete-user-modal" aria-hidden="true">
    <div class="relative h-full w-full max-w-md px-4 md:h-auto">
      <div class="relative rounded-lg bg-white shadow">
        <div class="flex justify-end p-2">
          <button
            type="button"
            class="ml-auto inline-flex items-center rounded-lg bg-transparent p-1.5 text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900"
            data-modal-toggle="delete-user-modal"
          >
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
        </div>

        <div class="p-6 pt-0 text-center">
          <svg class="mx-auto h-20 w-20 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <h3 class="mt-5 mb-6 text-xl font-normal text-gray-500">Are you sure you want to delete this user?</h3>
          <a href="#" class="mr-2 inline-flex items-center rounded-lg bg-red-600 px-3 py-2.5 text-center text-base font-medium text-white hover:bg-red-800 focus:ring-4 focus:ring-red-300">
            Yes, I'm sure
          </a>
          <a
            href="#"
            class="inline-flex items-center rounded-lg border border-gray-200 bg-white px-3 py-2.5 text-center text-base font-medium text-gray-900 hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200"
            data-modal-toggle="delete-user-modal"
          >
            No, cancel
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
