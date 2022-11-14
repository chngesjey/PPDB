<div class="modal fade" id="modalForm" padding-right: 17px; aria-modal="true" role="dialog" data-backdrop="static" data_keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">

                        <!-- Add Kode -->
                        <label class="" for="nama">Kode Barang</label>
                        <input type="text" name="kode" class="form-control" value="{{$kode}}" aria-label="Disabled input example" readonly>

                         <!-- Add Nama  -->
                        <label class="" for="nama">Nama Barang</label>
                        <input type="text" autocomplete="off" name="nama" id="nama" value="{{ old('nama')}}" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                         <!-- Add Kategori  -->
                        <label class="mt-2" for="nama">Kategori</label>
                        <select type="text" name="kategori_id" id="kategori_id" value="{{ old('kategori_id')}}" class="form-control @error('kategori_id') is-invalid @enderror">
                            <option selected>Pilih...</option>
                            @foreach($kategori as $kategori)
                                <option value="{{$kategori->id}}">{{$kategori->nama}}</option>
                            @endforeach
                        @error('kategori_id')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        </select>

                        <!-- Add Tempat  -->
                        <label class="mt-2" for="nama">Tempat</label>
                        <select type="text" name="tempat_id" id="tempat_id" class="form-control @error('tempat_id') is-invalid @enderror">
                            <option selected>Pilih...</option>
                            @foreach($tempat as $tempat)
                                <option value="{{$tempat->id}}">{{$tempat->nama}}</option>
                            @endforeach
                        @error('tempat_id')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        </select>

                         <!-- Add Stok  -->
                        <label class="mt-2" for="nama">Stok Barang</label>
                        <input type="number" name="stok" id="stok" value="{{ old('stok')}}" class="form-control @error('stok') is-invalid @enderror">
                        @error('stok')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                         <!-- Add Keterangan  -->
                        <label class="mt-2" for="nama">Keterangan</label>
                        <textarea type="text" name="keterangan" id="keterangan" value="{{ old('keterangan')}}" class="form-control @error('keterangan') is-invalid @enderror"></textarea>
                        @error('keterangan')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</div>