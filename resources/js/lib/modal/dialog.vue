<template>
  <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="user-modal" aria-hidden="true">
    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
      <div class="bg-white rounded-lg shadow relative">
        <div class="flex items-start justify-between p-5 border-b rounded-t">
          <h3 class="text-xl font-semibold">Edit user</h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="user-modal">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
        </div>

        <div class="p-6 space-y-6">
          <form action="#">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first-name" class="text-sm font-medium text-gray-900 block mb-2">First Name</label>
                <input
                  type="text"
                  name="first-name"
                  id="first-name"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                  placeholder="Bonnie"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="last-name" class="text-sm font-medium text-gray-900 block mb-2">Last Name</label>
                <input
                  type="text"
                  name="last-name"
                  id="last-name"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                  placeholder="Green"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                  placeholder="example@company.com"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="phone-number" class="text-sm font-medium text-gray-900 block mb-2">Phone Number</label>
                <input
                  type="number"
                  name="phone-number"
                  id="phone-number"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                  placeholder="e.g. +(12)3456 789"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="department" class="text-sm font-medium text-gray-900 block mb-2">Department</label>
                <input
                  type="text"
                  name="department"
                  id="department"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                  placeholder="Development"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="company" class="text-sm font-medium text-gray-900 block mb-2">Company</label>
                <input
                  type="number"
                  name="company"
                  id="company"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                  placeholder="123456"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="current-password" class="text-sm font-medium text-gray-900 block mb-2">Current Password</label>
                <input
                  type="password"
                  name="current-password"
                  id="current-password"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                  placeholder="••••••••"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="new-password" class="text-sm font-medium text-gray-900 block mb-2">New Password</label>
                <input
                  type="password"
                  name="new-password"
                  id="new-password"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                  placeholder="••••••••"
                  required=""
                />
              </div>
            </div>
          </form>
        </div>

        <div class="items-center p-6 border-t border-gray-200 rounded-b">
          <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Save all</button>
        </div>
      </div>
    </div>
  </div>

  <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="add-user-modal" aria-hidden="true">
    <div class="relative w-full max-w-2xl px-4 h-full md:h-auto">
      <div class="bg-white rounded-lg shadow relative">
        <div class="flex items-start justify-between p-5 border-b rounded-t">
          <h3 class="text-xl font-semibold">Add new user</h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="add-user-modal">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
        </div>

        <div class="p-6 space-y-6">
          <form action="#">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="first-name" class="text-sm font-medium text-gray-900 block mb-2">First Name</label>
                <input
                  type="text"
                  name="first-name"
                  id="first-name"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                  placeholder="Bonnie"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="last-name" class="text-sm font-medium text-gray-900 block mb-2">Last Name</label>
                <input
                  type="text"
                  name="last-name"
                  id="last-name"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                  placeholder="Green"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="email" class="text-sm font-medium text-gray-900 block mb-2">Email</label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                  placeholder="example@company.com"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="phone-number" class="text-sm font-medium text-gray-900 block mb-2">Phone Number</label>
                <input
                  type="number"
                  name="phone-number"
                  id="phone-number"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                  placeholder="e.g. +(12)3456 789"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="department" class="text-sm font-medium text-gray-900 block mb-2">Department</label>
                <input
                  type="text"
                  name="department"
                  id="department"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                  placeholder="Development"
                  required=""
                />
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="company" class="text-sm font-medium text-gray-900 block mb-2">Company</label>
                <input
                  type="number"
                  name="company"
                  id="company"
                  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5"
                  placeholder="123456"
                  required=""
                />
              </div>
            </div>
          </form>
        </div>

        <div class="items-center p-6 border-t border-gray-200 rounded-b">
          <button class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Add user</button>
        </div>
      </div>
    </div>
  </div>

  <div class="hidden overflow-x-hidden overflow-y-auto fixed top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center h-modal sm:h-full" id="delete-user-modal" aria-hidden="true">
    <div class="relative w-full max-w-md px-4 h-full md:h-auto">
      <div class="bg-white rounded-lg shadow relative">
        <div class="flex justify-end p-2">
          <button
            type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
            data-modal-toggle="delete-user-modal"
          >
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
        </div>

        <div class="p-6 pt-0 text-center">
          <svg class="w-20 h-20 text-red-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
          <h3 class="text-xl font-normal text-gray-500 mt-5 mb-6">Are you sure you want to delete this user?</h3>
          <a href="#" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2">
            Yes, I'm sure
          </a>
          <a
            href="#"
            class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center"
            data-modal-toggle="delete-user-modal"
          >
            No, cancel
          </a>
        </div>
      </div>
    </div>
  </div>
</template>