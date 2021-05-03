<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="{{ route('master.student.index') }}">Siswa</a></div>
                <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>
    </section>

    <div class="section-body">
        <div class="row">
            <div class="col-12">                
                <form action="{{ route('master.student.store') }}" method="post">
                    @method('post')
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <x-inputs.text
                                    required
                                    name="name"
                                    label="nama"
                                />
                            </div>
                            <div class="form-group">
                                <x-inputs.number
                                    name="nis"
                                    label="nis"
                                />
                            </div>
                            <div class="form-group">
                                <x-inputs.number
                                    name="nisn"
                                    label="nisn"
                                />
                            </div>
                            <div class="form-group">
                                <x-inputs.select-constant
                                    required
                                    name="sex"
                                    :data="$sexuals"
                                    label="jenis kelamin"
                                />
                            </div>
                            <div class="form-group">
                                <x-inputs.select-constant
                                    required
                                    name="religion"
                                    :data="$religions"
                                    label="agama"
                                />
                            </div>
                            <div class="form-group">
                                <x-inputs.select
                                    required
                                    name="room_id"
                                    :data="$rooms"
                                    key="id"
                                    text="name"
                                    label="kelas"
                                />
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke pull-right">
                            <button type="button" class="btn btn-danger">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
