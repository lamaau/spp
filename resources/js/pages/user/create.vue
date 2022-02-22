<template>
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
</template>
<script>
export default {
  //
};
</script>