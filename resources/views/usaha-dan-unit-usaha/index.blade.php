<x-app>
    <x-slot:sidebar>
        <x-sidebar></x-sidebar>

    </x-slot:sidebar>
    <x-slot:topmenu>
        <x-topmenu></x-topmenu>

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data Usaha Dan Unit Usaha</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table w-100 align-items-center mb-0">
                                    <thead class="text-center">
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID Usaha Dan Unit Usaha</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                NAMA BUM Desa</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                NAMA KECAMATAN</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                NAMA DESA</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                NAMA PENILAI</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Total Nilai</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usaha as $data)
                                        <tr class="text-center w-100">
                                            <td scope="row">{{ $data->id }}</td>

                                            <td>{{ $data->bumdesa }}</td>
                                            <td>{{ $data->nama_kecamatan }}</td>
                                            <td>{{ $data->nama_desa }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->total_nilai }}</td>

                                            <td>

                                                <div class="text-center ">
                                                    <a class="btn btn-link text-success text-gradient px-3 mb-0" href="{{ route('usaha-dan-unit-usaha.show', $data->id) }}"><i class="fas fa-clipboard-list me-2"></i>Detail</a>
                                                    <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('usaha-dan-unit-usaha.edit', $data->id) }}"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                                    <form action="{{ route('usaha-dan-unit-usaha.destroy', $data->id) }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button onclick="return confirm ('Apakah Anda Ingin Menghapus Data Tersebut?')" class="btn btn-link text-danger text-gradient px-3 mb-0" type="submit" value="Delete"><i class="far fa-trash-alt me-2"></i>Hapus</button>
                                                    </form>
                                                </div>
                                            </td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    @php
                        //{{ $users->links() }}
                    @endphp
                </div>
            </div>

            @include('sweetalert::alert')

    </x-slot:topmenu>
</x-app>
