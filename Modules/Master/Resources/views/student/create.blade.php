<x-app-layout :title="$title">
    <h2 class="mb-4 text-xl font-semibold leading-tight text-gray-700">{{ $title }}</h2>
    <form action="{{ route('master.student.store') }}" method="post" class="w-full p-6 bg-gray-100 rounded-md">
        @csrf
        <div class="flex flex-col space-y-3 text-gray-700">
            <div>
                <x-inputs.text label="Nama" name="name" />
            </div>
            <div>
                <x-inputs.text label="Nisn" name="nisn" />
            </div>
            <div x-data=" select({ url: 'constant/sex', name: 'sex', old: '{{ old('sex') }}' })" x-init="init()">
                <x-inputs.select name="sex" label="Jenis Kelamin" />
            </div>
            <div>
                <x-inputs.text label="Email" name="email" />
            </div>
            <div>
                <x-inputs.text label="Nomor HP" name="phone" />
            </div>
            <div x-data=" select({ url: 'constant/religion', name: 'religion' })" x-init="init()">
                <x-inputs.select name="religion" label="Agama" />
            </div>
            <div x-data=" select({ url: 'room', name: 'room_id' })" x-init="init()">
                <x-inputs.select name="room_id" label="Kelas" />
            </div>
            <div x-data=" select({ url: 'constant/force', name: 'force' })" x-init="init()">
                <x-inputs.select name="force" label="Angkatan" />
            </div>
            <div x-data=" select({ data: [{id: 1, name: 'Default'}, {id: 2, name: 'Pindahan'}], name: 'status' })"
                x-init="init()">
                <x-inputs.select name="status" label="Status" />
            </div>
        </div>
        <div class="flex justify-end mt-4 space-x-2 ">
            <a href=" {{ route('master.student.index') }}"
                class="px-3 py-2 text-sm text-white bg-gray-600 rounded shadow focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:shadow-outline">Daftar
                Siswa</a>
            <button type=" submit"
                class="px-3 py-2 text-sm text-white bg-indigo-600 rounded shadow focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:shadow-outline">Simpan</button>
        </div>
    </form>
    @push('scripts')
        <script type="text/javascript">
            // 

        </script>
    @endpush
</x-app-layout>
