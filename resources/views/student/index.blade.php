<x-app-layout :title="$title">
    <x-layouts.table x-data="DataTable.table({
        heading: 'Tabel Siswa',
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
        ]
    })" />
</x-app-layout>
