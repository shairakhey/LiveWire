<div class="container">
    @if($errors->any())
        <div class="pt-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $item)
                    <li>{{$item}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if(session()->has('message'))
        <div class="pt-3">
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        </div>
    @endif
        <!-- START FORM -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <form>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="nama">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" wire:model="email">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" wire:model="alamat">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        @if ($updateData == false)
                        <button type="button" class="btn btn-primary" name="submit" wire:click="store()">SIMPAN
                        </button>
                        @else
                        <button type="button" class="btn btn-primary" name="submit" wire:click="update()">UPDATE
                        </button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <!-- AKHIR FORM -->

        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h1>Data Pegawai</h1>
            {{ $dataEmployees->links() }}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-1">No</th>
                        <th class="col-md-4">Nama</th>
                        <th class="col-md-3">Email</th>
                        <th class="col-md-2">Alamat</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataEmployees as $key => $value)
                    <tr>
                        <td>{{ $dataEmployees->firstItem() + $key  }}</td>
                        <td>{{ $value->nama }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->alamat }}</td>
                        <td>
                            <a wire:click="edit({{ $value->id }})" class="btn btn-warning btn-sm">Edit</a>
                            <a href="" class="btn btn-danger btn-sm">Del</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $dataEmployees->links() }}
        </div>
        <!-- AKHIR DATA -->
    </div>