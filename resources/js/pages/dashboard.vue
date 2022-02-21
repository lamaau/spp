<template>
  <div class="py-6 px-4">
    <div class="grid w-full grid-cols-1 gap-4 xl:grid-cols-2 2xl:grid-cols-3">
      <div class="rounded-lg bg-white p-4 shadow sm:p-6 xl:p-8 2xl:col-span-2">
        <div class="mb-4 flex items-center justify-between">
          <div class="flex-shrink-0">
            <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl">$45,385</span>
            <h3 class="text-base font-normal text-gray-500">Sales this week</h3>
          </div>
          <div class="flex flex-1 items-center justify-end text-base font-bold text-green-500">
            12.5%
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </div>
        </div>
        <div id="main-chart"></div>
      </div>
      <div class="rounded-lg bg-white p-4 shadow sm:p-6 xl:p-8">
        <div class="mb-4 flex items-center justify-between">
          <div>
            <h3 class="mb-2 text-xl font-bold text-gray-900">Latest Transactions</h3>
            <span class="text-base font-normal text-gray-500">This is a list of latest transactions</span>
          </div>
          <div class="flex-shrink-0">
            <a href="#" class="rounded-lg p-2 text-sm font-medium text-cyan-600 hover:bg-gray-100">View all</a>
          </div>
        </div>
        <div class="mt-8 flex flex-col">
          <div class="overflow-x-auto rounded-lg">
            <div class="inline-block min-w-full align-middle">
              <div class="overflow-hidden shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                  <thead class="bg-gray-50">
                    <tr>
                      <th scope="col" class="p-4 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Transaction</th>
                      <th scope="col" class="p-4 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Date & Time</th>
                      <th scope="col" class="p-4 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Amount</th>
                    </tr>
                  </thead>
                  <tbody class="bg-white">
                    <tr>
                      <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-900">Payment from <span class="font-semibold">Bonnie Green</span></td>
                      <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">Apr 23 ,2021</td>
                      <td class="whitespace-nowrap p-4 text-sm font-semibold text-gray-900">$2300</td>
                    </tr>
                    <tr class="bg-gray-50">
                      <td class="rounded-left whitespace-nowrap rounded-lg p-4 text-sm font-normal text-gray-900">Payment refund to <span class="font-semibold">#00910</span></td>
                      <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">Apr 23 ,2021</td>
                      <td class="whitespace-nowrap p-4 text-sm font-semibold text-gray-900">-$670</td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-900">Payment failed from <span class="font-semibold">#087651</span></td>
                      <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">Apr 18 ,2021</td>
                      <td class="whitespace-nowrap p-4 text-sm font-semibold text-gray-900">$234</td>
                    </tr>
                    <tr class="bg-gray-50">
                      <td class="rounded-left whitespace-nowrap rounded-lg p-4 text-sm font-normal text-gray-900">Payment from <span class="font-semibold">Lana Byrd</span></td>
                      <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">Apr 15 ,2021</td>
                      <td class="whitespace-nowrap p-4 text-sm font-semibold text-gray-900">$5000</td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-900">Payment from <span class="font-semibold">Jese Leos</span></td>
                      <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">Apr 15 ,2021</td>
                      <td class="whitespace-nowrap p-4 text-sm font-semibold text-gray-900">$2300</td>
                    </tr>
                    <tr class="bg-gray-50">
                      <td class="rounded-left whitespace-nowrap rounded-lg p-4 text-sm font-normal text-gray-900">Payment from <span class="font-semibold">THEMESBERG LLC</span></td>
                      <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">Apr 11 ,2021</td>
                      <td class="whitespace-nowrap p-4 text-sm font-semibold text-gray-900">$560</td>
                    </tr>
                    <tr>
                      <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-900">Payment from <span class="font-semibold">Lana Lysle</span></td>
                      <td class="whitespace-nowrap p-4 text-sm font-normal text-gray-500">Apr 6 ,2021</td>
                      <td class="whitespace-nowrap p-4 text-sm font-semibold text-gray-900">$1437</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-4 grid w-full grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
      <v-stats-card v-for="(item, index) in stats" :key="index" />
    </div>
    <div class="my-4 grid grid-cols-1 xl:gap-4 2xl:grid-cols-2">
      <div class="mb-4 h-full rounded-lg bg-white p-4 shadow sm:p-6">
        <div class="mb-4 flex items-center justify-between">
          <h3 class="text-xl font-bold leading-none text-gray-900">Latest Customers</h3>
          <a href="#" class="inline-flex items-center rounded-lg p-2 text-sm font-medium text-cyan-600 hover:bg-gray-100"> View all </a>
        </div>
        <div class="flow-root">
          <ul role="list" class="divide-y divide-gray-200">
            <li class="py-3 sm:py-4">
              <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                  <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/neil-sims.png" alt="Neil image" />
                </div>
                <div class="min-w-0 flex-1">
                  <p class="truncate text-sm font-medium text-gray-900">Neil Sims</p>
                  <p class="truncate text-sm text-gray-500">
                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="17727a767e7b57607e7973646372653974787a">[email&#160;protected]</a>
                  </p>
                </div>
                <div class="inline-flex items-center text-base font-semibold text-gray-900">$320</div>
              </div>
            </li>
            <li class="py-3 sm:py-4">
              <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                  <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/bonnie-green.png" alt="Neil image" />
                </div>
                <div class="min-w-0 flex-1">
                  <p class="truncate text-sm font-medium text-gray-900">Bonnie Green</p>
                  <p class="truncate text-sm text-gray-500">
                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d4b1b9b5bdb894a3bdbab0a7a0b1a6fab7bbb9">[email&#160;protected]</a>
                  </p>
                </div>
                <div class="inline-flex items-center text-base font-semibold text-gray-900">$3467</div>
              </div>
            </li>
            <li class="py-3 sm:py-4">
              <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                  <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/michael-gough.png" alt="Neil image" />
                </div>
                <div class="min-w-0 flex-1">
                  <p class="truncate text-sm font-medium text-gray-900">Michael Gough</p>
                  <p class="truncate text-sm text-gray-500">
                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="57323a363e3b17203e3933242332257934383a">[email&#160;protected]</a>
                  </p>
                </div>
                <div class="inline-flex items-center text-base font-semibold text-gray-900">$67</div>
              </div>
            </li>
            <li class="py-3 sm:py-4">
              <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                  <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/thomas-lean.png" alt="Neil image" />
                </div>
                <div class="min-w-0 flex-1">
                  <p class="truncate text-sm font-medium text-gray-900">Thomes Lean</p>
                  <p class="truncate text-sm text-gray-500">
                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="284d45494144685f41464c5b5c4d5a064b4745">[email&#160;protected]</a>
                  </p>
                </div>
                <div class="inline-flex items-center text-base font-semibold text-gray-900">$2367</div>
              </div>
            </li>
            <li class="pt-3 pb-0 sm:pt-4">
              <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                  <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/lana-byrd.png" alt="Neil image" />
                </div>
                <div class="min-w-0 flex-1">
                  <p class="truncate text-sm font-medium text-gray-900">Lana Byrd</p>
                  <p class="truncate text-sm text-gray-500">
                    <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a2c7cfc3cbcee2d5cbccc6d1d6c7d08cc1cdcf">[email&#160;protected]</a>
                  </p>
                </div>
                <div class="inline-flex items-center text-base font-semibold text-gray-900">$367</div>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="rounded-lg bg-white p-4 shadow sm:p-6 xl:p-8">
        <h3 class="mb-10 text-xl font-bold leading-none text-gray-900">Acquisition Overview</h3>
        <div class="block w-full overflow-x-auto">
          <table class="w-full border-collapse items-center bg-transparent">
            <thead>
              <tr>
                <th class="whitespace-nowrap border-l-0 border-r-0 bg-gray-50 px-4 py-3 text-left align-middle text-xs font-semibold uppercase text-gray-700">Top Channels</th>
                <th class="whitespace-nowrap border-l-0 border-r-0 bg-gray-50 px-4 py-3 text-left align-middle text-xs font-semibold uppercase text-gray-700">Users</th>
                <th class="min-w-140-px whitespace-nowrap border-l-0 border-r-0 bg-gray-50 px-4 py-3 text-left align-middle text-xs font-semibold uppercase text-gray-700"></th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
              <tr class="text-gray-500">
                <th class="whitespace-nowrap border-t-0 p-4 px-4 text-left align-middle text-sm font-normal">Organic Search</th>
                <td class="whitespace-nowrap border-t-0 p-4 px-4 align-middle text-xs font-medium text-gray-900">5,649</td>
                <td class="whitespace-nowrap border-t-0 p-4 px-4 align-middle text-xs">
                  <div class="flex items-center">
                    <span class="mr-2 text-xs font-medium">30%</span>
                    <div class="relative w-full">
                      <div class="h-2 w-full rounded-sm bg-gray-200">
                        <div class="h-2 rounded-sm bg-cyan-600" style="width: 30%"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="text-gray-500">
                <th class="whitespace-nowrap border-t-0 p-4 px-4 text-left align-middle text-sm font-normal">Referral</th>
                <td class="whitespace-nowrap border-t-0 p-4 px-4 align-middle text-xs font-medium text-gray-900">4,025</td>
                <td class="whitespace-nowrap border-t-0 p-4 px-4 align-middle text-xs">
                  <div class="flex items-center">
                    <span class="mr-2 text-xs font-medium">24%</span>
                    <div class="relative w-full">
                      <div class="h-2 w-full rounded-sm bg-gray-200">
                        <div class="h-2 rounded-sm bg-orange-300" style="width: 24%"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="text-gray-500">
                <th class="whitespace-nowrap border-t-0 p-4 px-4 text-left align-middle text-sm font-normal">Direct</th>
                <td class="whitespace-nowrap border-t-0 p-4 px-4 align-middle text-xs font-medium text-gray-900">3,105</td>
                <td class="whitespace-nowrap border-t-0 p-4 px-4 align-middle text-xs">
                  <div class="flex items-center">
                    <span class="mr-2 text-xs font-medium">18%</span>
                    <div class="relative w-full">
                      <div class="h-2 w-full rounded-sm bg-gray-200">
                        <div class="h-2 rounded-sm bg-teal-400" style="width: 18%"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="text-gray-500">
                <th class="whitespace-nowrap border-t-0 p-4 px-4 text-left align-middle text-sm font-normal">Social</th>
                <td class="whitespace-nowrap border-t-0 p-4 px-4 align-middle text-xs font-medium text-gray-900">1251</td>
                <td class="whitespace-nowrap border-t-0 p-4 px-4 align-middle text-xs">
                  <div class="flex items-center">
                    <span class="mr-2 text-xs font-medium">12%</span>
                    <div class="relative w-full">
                      <div class="h-2 w-full rounded-sm bg-gray-200">
                        <div class="h-2 rounded-sm bg-pink-600" style="width: 12%"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="text-gray-500">
                <th class="whitespace-nowrap border-t-0 p-4 px-4 text-left align-middle text-sm font-normal">Other</th>
                <td class="whitespace-nowrap border-t-0 p-4 px-4 align-middle text-xs font-medium text-gray-900">734</td>
                <td class="whitespace-nowrap border-t-0 p-4 px-4 align-middle text-xs">
                  <div class="flex items-center">
                    <span class="mr-2 text-xs font-medium">9%</span>
                    <div class="relative w-full">
                      <div class="h-2 w-full rounded-sm bg-gray-200">
                        <div class="h-2 rounded-sm bg-indigo-600" style="width: 9%"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
              <tr class="text-gray-500">
                <th class="whitespace-nowrap border-t-0 p-4 pb-0 text-left align-middle text-sm font-normal">Email</th>
                <td class="whitespace-nowrap border-t-0 p-4 pb-0 align-middle text-xs font-medium text-gray-900">456</td>
                <td class="whitespace-nowrap border-t-0 p-4 pb-0 align-middle text-xs">
                  <div class="flex items-center">
                    <span class="mr-2 text-xs font-medium">7%</span>
                    <div class="relative w-full">
                      <div class="h-2 w-full rounded-sm bg-gray-200">
                        <div class="h-2 rounded-sm bg-purple-500" style="width: 7%"></div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { defineComponent } from "vue";
import stats from "~/components/layouts/stats-card.json";

export default defineComponent({
  setup() {
    return {
      stats,
    };
  },
});
</script>
