<x-app-layout :title="$title">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('master.student.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>{{ $title }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="{{ route('master.student.index') }}">Siswa</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>
    </section>

    <div class="section-body">
        <div class="row">
            <div class="col-12">                
                <form action="{{ route('master.student.update', ['id' => $row->id]) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <x-inputs.text
                                    required
                                    name="name"
                                    label="nama"
                                    :value="$row->name"
                                />
                            </div>
                            <div class="form-group">
                                <x-inputs.number
                                    name="nis"
                                    label="nis"
                                    :value="$row->nis"
                                />
                            </div>
                            <div class="form-group">
                                <x-inputs.number
                                    name="nisn"
                                    label="nisn"
                                    :value="$row->nisn"
                                />
                            </div>
                            <div class="form-group">
                                <x-inputs.select-constant
                                    required
                                    name="sex"
                                    :data="$sexuals"
                                    :value="$row->sex"
                                    label="jenis kelamin"
                                />
                            </div>
                            <div class="form-group">
                                <x-inputs.select-constant
                                    required
                                    label="agama"
                                    name="religion"
                                    :data="$religions"
                                    :value="$row->religion"
                                />
                            </div>
                            <div class="form-group">
                                <x-inputs.select
                                    required
                                    key="id"
                                    text="name"
                                    label="kelas"
                                    name="room_id"
                                    :data="$rooms"
                                    :value="$row->room_id"
                                />
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke pull-right">
                            <button type="button" class="btn btn-danger">Batal</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
