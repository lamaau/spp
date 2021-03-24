<x-app-layout :title="$title">
    <x-layouts.table x-data="DataTable.table({...InvoiceDataTable})" x-init="init()">
        <x-slot name="actions">
            <div class="flex justify-end mr-2">
                <select x-model="sort"
                    class="block py-2 leading-tight text-gray-700 bg-white border-t border-b border-r border-gray-400 rounded appearance-none focus:border-l focus:outline-none focus:bg-white focus:border-gray-500">
                    <option value="all">semua</option>
                    <option value="paid">sudah dibayar</option>
                    <option value="unpaid">belum dibayar</option>
                </select>
            </div>
        </x-slot>
    </x-layouts.table>
    <x-slot name="javascript">
        <script type="text/javascript">
            const InvoiceDataTable = {
                url: "/invoice/list",
                defaultTableComponent: false,
                sorted: {
                    key: "status",
                    rule: "asc",
                },
                columns: [{
                        key: 'id',
                        visibility: 'hidden',
                    },
                    {
                        key: 'code',
                        text: 'Invoice',
                        sortable: true,
                        width: '8rem'
                    },
                    {
                        key: 'invoice_date',
                        text: 'Invoice Date',
                        sortable: true,
                        width: '8rem'
                    },
                    {
                        key: 'invoice_due',
                        text: 'Due Date',
                        sortable: true,
                        width: '8rem'
                    },
                    {
                        key: 'invoice',
                        text: 'Total',
                        sortable: true,
                    },
                    {
                        key: 'status',
                        text: 'Status',
                        sortable: true,
                    }
                ]
            };

        </script>
    </x-slot>
</x-app-layout>
