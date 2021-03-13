<x-app-layout :title="$title">
    <x-layouts.table x-data="DataTable.table(student)" x-init="init()">
        <x-slot name="action">
            <button class="p-2 text-sm text-white bg-indigo-600 rounded focus:outline-none focus:ring-2">
                <x-icons.edit class="w-4" />
            </button>
            <button class="p-2 text-sm text-white bg-red-600 rounded focus:outline-none focus:ring-2">
                <x-icons.trash class="w-4" />
            </button>
        </x-slot>
    </x-layouts.table>
    <x-slot name="javascript">
        <script type="text/javascript">
            const student = {
                heading: 'Tabel Siswa',
                endpoint: "/students/list",
                columns: [{
                        key: 'name',
                        text: 'Nama',
                        sortable: true,
                    },
                    {
                        key: 'email',
                        text: 'Email',
                        sortable: true,
                    },
                    {
                        key: 'nisn',
                        text: 'nisn',
                        sortable: true,
                    },
                    {
                        key: 'action',
                        text: 'Aksi',
                        sortable: false,
                    }
                ],
            };

        </script>
    </x-slot>
</x-app-layout>
