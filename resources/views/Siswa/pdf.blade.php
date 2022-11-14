<table>


    <tr>
        <td>Kode</td>
        <td>
            {{$barang->kode}}
        </td>
    </tr>

    <tr>
        <td>Nama Barang</td>
        <td>
            {{$barang->nama}}
        </td>
    </tr>

    <tr>
        <td>Tempat</td>
        <td>
            {{$barang->tempat->nama}}
        </td>
    </tr>

    <tr>
        <td>Stok</td>
        <td>
            {{$barang->stok}}
        </td>
    </tr>

    <tr>
        <td>Keterangan</td>
        <td>
            {{$barang->keterangan}}
        </td>
    </tr>
</table>